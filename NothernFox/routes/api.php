<?php
use App\Http\Controllers\AuthControllerAPI;
use App\Http\Controllers\CategoryControllerAPI;
use App\Http\Controllers\CategoryImagesControllerAPI;
use App\Http\Controllers\ItemControllerAPI;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/categories',[CategoryControllerAPI::class, 'index']);

//Add route for CCAPI::show()
Route::get('/items',[ItemControllerAPI::class, 'index']);
Route::get('/categories/{category}',[CategoryControllerAPI::class, 'show']);
Route::get('/categories/{category}/{item}',[ItemControllerAPI::class, 'show']);
//Add route for ICAPI::show()

Route::post('/login', [AuthControllerAPI::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/create-categories',[CategoryControllerAPI::class, 'store']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthControllerAPI::class, 'logout']);
});
