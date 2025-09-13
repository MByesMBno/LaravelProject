<?php
use App\Http\Controllers\CategoryControllerAPI;
use App\Http\Controllers\CategoryImagesControllerAPI;
use App\Http\Controllers\ItemControllerAPI;
use Illuminate\Support\Facades\Route;



Route::get('/category', [CategoryControllerAPI::class, 'index']);
Route::get('/category/{id}', [CategoryControllerAPI::class, 'show']);

Route::get('/categories_image', [CategoryImagesControllerAPI::class, 'index']);
Route::get('/categories_image/{id}', [CategoryImagesControllerAPI::class, 'show']);

Route::get('/items', [ItemControllerAPI::class, 'index']);
Route::get('/items/{id}', [ItemControllerAPI::class, 'show']);
