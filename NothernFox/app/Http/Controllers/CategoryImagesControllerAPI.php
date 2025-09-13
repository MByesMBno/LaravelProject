<?php

namespace App\Http\Controllers;

use App\Models\categories_image;
use Illuminate\Http\Request;

class CategoryImagesControllerAPI extends Controller
{

    public function index()
    {
        return response(categories_image::all());
    }
    public function show(string $id)
    {
        return response(categories_image::find($id));
    }

}
