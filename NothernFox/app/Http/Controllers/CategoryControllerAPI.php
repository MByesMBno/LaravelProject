<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryControllerAPI extends Controller
{

    public function index()
    {
        return response(category::all());
    }


    public function show(string $id)
    {
        return response(category::find($id));
    }
}
