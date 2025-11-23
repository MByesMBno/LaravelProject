<?php
namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Models\category;
class ItemControllerAPI extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perpage ?? 5;
        $categories = item::with('images')
            ->paginate($perPage);

        return response()->json($categories);
    }

    public function total()
    {
        return response(item::all());
    }

    public function show(category $category,item $item)
    {
        if (!$item || !$category) {
            return response()->json([
                'code' => 1,
                'message' => 'Предмет не найден'
            ], 404);
        }
        return response()->json($item);
    }

}
