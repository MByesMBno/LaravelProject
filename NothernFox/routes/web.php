<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $backUrl = route('categories');
    return view('main', compact('backUrl')); })->name('home');

Route::get('/categories', [shopController::class, 'index'])->name('categories');

Route::get('/categories/{category}/items', [shopController::class, 'show'])->name('category');

Route::get('/categories/{category}/items/{item}', [ItemController::class, 'show'])->name('item');

Route::get("/item", [ItemController::class,"list"])->name("item_list");

Route::get("/item/create", [ItemController::class,"create"])->name("create");

Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name("edit");

Route::post('/item/update/{id}', [ItemController::class, 'update'])->name("update");

Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('destroy');

Route::post("/item", [ItemController::class,"store"])->name("validation");


