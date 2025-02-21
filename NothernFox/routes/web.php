<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class,'show']);
Route::get('/item', [ItemController::class,'index']);

Route::get('/order/{id}', [OrderController::class,'show']);
