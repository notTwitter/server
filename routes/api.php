<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;

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

// // Posts
Route::get('/posts',  [PostsController::class, 'index']);
Route::get('/posts/{id}',  [PostsController::class, 'show']);
Route::get('posts/search/{name}', [PostsController::class, 'search']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth
    Route::post('/user/logout', [AuthController::class,  'logout']);
    // // Posts
    Route::post('/posts/upload', [PostsController::class,  'store']);
    Route::put('/posts/{id}', [PostsController::class,  'update']);
    Route::delete('/posts/{id}', [PostsController::class,  'destroy']);
});
