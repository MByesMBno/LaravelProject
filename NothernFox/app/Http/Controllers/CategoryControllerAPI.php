<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\categories_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;
class CategoryControllerAPI extends Controller
{
    public function store(Request $request)
    {
        if (!Gate::allows('create-category')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление категории',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|string',
            'image' => 'required|file|image|max:10240'
        ]);
        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
        try {

            $path = Storage::disk('yandex')->putFileAs('categories', $file, $fileName);
            $dbFilePath = '/categories/' . $fileName;

        } catch (Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в Yandex Object Storage',
            ]);
        }
        DB::beginTransaction();
        try {
            $category = new Category();
            $category->name = $validated['name'];
            $category->description = $validated['description'] ?? null;
            $category->save();

            $categories_image = new categories_image();
            $categories_image->category_id = $category->id;
            $categories_image->url = $dbFilePath ;
            $categories_image->save();


            DB::commit();

            return response()->json([
                'code' => 0,
                'message' => 'Категория успешно добавлена',
                'data' => [
                    'category' => $category,
                    'image_url' => $dbFilePath
                ]
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            try {
                Storage::disk('yandex')->delete($path);
            } catch (Exception $deleteException) {

                \Log::error('Failed to delete file from storage: ' . $deleteException->getMessage());
            }

            return response()->json([
                'code' => 3,
                'message' => 'Ошибка при сохранении данных в базу',
            ]);
        }
    }

    public function index(Request $request)
    {
        $perPage = $request->perpage ?? 7;
        $categories = Category::with('images')
            ->paginate($perPage);

        return response()->json($categories);
    }

    public function total()
    {
        $categories = Category::with('image')->get();
        return response()->json($categories);
    }

    public function show(Category $category)
    {
        $categories =  item::with('images')->get();
        $items = $category->items;
        if (!$items) {
            return response()->json([
                'code' => 1,
                'message' => 'Предметы не найден'
            ], 404);
        }

        return response()->json($items);
    }

}
