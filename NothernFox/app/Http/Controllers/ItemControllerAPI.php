<?php
namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemControllerAPI extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->perpage ?? 5;
        return response(item::paginate($perPage));
    }
    public function total()
    {
        return response(item::all());
    }

    public function show(string $id)
    {
        return response(item::find($id));
    }

}
