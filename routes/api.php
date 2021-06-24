<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

// Route::post('/products', [ProductController::class, 'store']);


//public route
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::resource('products', ProductController::class);
// Route::get('products/search/{name}', [ProductController::class, 'search']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('products/search/{name}', [ProductController::class, 'search']);
    Route::get('logout', [UserController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
