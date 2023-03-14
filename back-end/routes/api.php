<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
Route::get('user', [UserController::class, 'profile']);
    Route::controller(UserController::class)->prefix('/users')->group(function () {
        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('{id}', 'show');
    });
    Route::controller(ProductController::class)->prefix('/products')->group(function () {
        Route::get('', 'index');
        Route::get('fiction-book', 'getFictionBook');
        Route::get('best-sellers', 'getBestSellers');
        Route::get('new-arrivals', 'getNewArrivals');
        Route::get('wishlist', 'getWishList');
        Route::post('wishlist', 'likedProduct');
        Route::post('wishlist/{id}', 'destroyLikedProduct');
        Route::get('{id}', 'show');
        Route::post('{id}/delete', 'destroy');
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
        Route::get('all', 'getOrderByUser');
        Route::post('{id}/delete', 'destroy');
    });
    Route::controller(AuthorController::class)->prefix('/authors')->group(function () {
        Route::get('', 'index');
    });
