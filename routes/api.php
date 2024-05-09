<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\admin\ProductController;
use \App\Http\Controllers\admin\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('variant-size', [ProductController::class, 'variantSize']);
Route::post('variant-color', [ProductController::class, 'variantColor']);
Route::post('get-children-c2', [CategoryController::class, 'getChildrenC2']);
