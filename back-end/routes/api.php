<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(UserController::class)->prefix('/users')->group(function () {
    Route::get('', 'index');
});
Route::controller(ProductController::class)->prefix('/products')->group(function () {
    Route::get('', 'index');
});
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::get('highest', 'getHighestCategory');
    Route::get('{category_id}', 'show');
    Route::get('{category_id}/child', 'getChildCategory');
    Route::get('{category_id}/parent', 'getParentCategory');
    Route::controller(ProductController::class)->prefix('{category_id}/products')->group(function () {
        Route::get('', 'getProductByCategory');
    });
});
Route::controller(CartController::class)->prefix('/carts')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
});
Route::controller(OrderController::class)->prefix('/orders')->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
});
