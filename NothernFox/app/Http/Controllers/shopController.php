<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Models\category;
use Storage;
class shopController extends Controller
{
    public function index()
    {
        $backUrl = route('home');
        $categories =  Category::with('images')->get();
        return view('categories', compact('categories', 'backUrl'));
    }

    public function show(Category $category)
    {
        $categories =  item::with('images')->get();
        $backUrl = route('categories');
        $items = $category->items;
        return view('items', compact('category', 'items', 'backUrl'));
    }
}
