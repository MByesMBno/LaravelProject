<?php
namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemControllerAPI extends Controller
{

    public function index()
    {
        return response(item::all());
    }

    public function show(string $id)
    {
        return response(item::find($id));
    }

}
