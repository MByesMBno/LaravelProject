<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $backUrl = route('categories');
    return view('main', compact('backUrl')); })->name('home');

Route::get('/categories', [shopController::class, 'index'])->name('categories');

Route::get('/categories/{category}/items', [shopController::class, 'show'])->name('category');

Route::get('/categories/{category}/items/{item}', [ItemController::class, 'show'])->name('item');

Route::get("/item", [ItemController::class,"list"])->name("item_list");

Route::get("/item/create", [ItemController::class,"create"])->name("create")->middleware("auth");

Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name("edit")->middleware("auth");

Route::post('/item/update/{id}', [ItemController::class, 'update'])->name("update")->middleware("auth");

Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('destroy')->middleware("auth");

Route::post("/item", [ItemController::class,"store"])->name("validation");

Route::get('/login', [LoginController::class, 'login'])->name("login");

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function(){
    return view('error', ['message' => session('message')]);
});

Route::get('/register', [RegController::class, 'index'])->name('register');

Route::post('/reg', [RegController::class, 'register'])->name('reg');
