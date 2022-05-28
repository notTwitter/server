<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

// PUblic routes
// Route::resource('products', ProductController::class);
// auth
Route::post('/user/register', [AuthController::class,  'register']);
Route::post('/user/login', [AuthController::class,  'login']);

// // Products
// Route::get('/products',  [ProductController::class, 'index']);
// Route::get('/products/{id}',  [ProductController::class, 'show']);
// Route::get('products/search/{name}', [ProductController::class, 'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth
    Route::post('/user/logout', [AuthController::class,  'logout']);
    // // Products
    // Route::post('/products', [ProductController::class,  'store']);
    // Route::put('/products/{id}', [ProductController::class,  'update']);
    // Route::delete('/products/{id}', [ProductController::class,  'destroy']);
});
