<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\categories_image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;
class CategoryControllerAPI extends Controller
{

     public function getCategoryImage($categoryId)
    {
        try {
            // Находим запись об изображении категории
            $categoryImage = categories_image::where('category_id', $categoryId)->first();

            if (!$categoryImage) {
                return response()->json([
                    'code' => 1,
                    'message' => 'Изображение для категории не найдено',
                ], 404);
            }

            // Получаем путь к файлу из базы данных
            $filePath = $categoryImage->url;

            // Проверяем существование файла в Yandex Object Storage
            if (!Storage::disk('yandex')->exists($filePath)) {
                return response()->json([
                    'code' => 2,
                    'message' => 'Файл изображения не найден в хранилище',
                ], 404);
            }

            // Получаем файл из хранилища
            $file = Storage::disk('yandex')->get($filePath);
            $mimeType = Storage::disk('yandex')->mimeType($filePath);

            // Определяем правильный Content-Type
            $contentType = $this->getContentType($mimeType, $filePath);

            // Возвращаем изображение с правильными заголовками
            return response($file, 200)
                ->header('Content-Type', $contentType)
                ->header('Content-Length', Storage::disk('yandex')->size($filePath))
                ->header('Cache-Control', 'public, max-age=3600') // Кэширование на 1 час
                ->header('Access-Control-Allow-Origin', '*');

        } catch (\Exception $e) {
            \Log::error('Error fetching category image: ' . $e->getMessage());

            return response()->json([
                'code' => 3,
                'message' => 'Ошибка при получении изображения',
            ], 500);
        }
    }


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
        $perPage = $request->perpage ?? 5;//использовал способ пагинации как в прошлом курсе по ларавель
        return response(category::paginate($perPage));
    }

    public function total()
    {
        return response(category::all());
    }

    public function show(string $id)
    {
        return response(category::find($id));
    }

    private function getContentType($mimeType, $filePath)
    {
        if ($mimeType) {
            return $mimeType;
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
        ];

        return $mimeTypes[strtolower($extension)] ?? 'image/jpeg';
    }



}
