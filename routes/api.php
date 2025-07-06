<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\ProductController as UserProductController;
use App\Http\Controllers\Api\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login'])->name('api.user.login');
Route::post('/register', [AuthController::class, 'register'])->name('api.user.register');

Route::get('/products', [UserProductController::class,'index'])->name('api.user.products.index');
Route::get('/products/{product}', [UserProductController::class,'show'])->name('api.user.products.show');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.user.logout');
    Route::get('/orders', [OrderController::class, 'index'])->name('api.user.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('api.user.orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('api.user.orders.store');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('api.user.orders.cancel');


    Route::middleware('admin')->prefix('/admin')->group(function (){
        Route::ApiResource('/products', AdminProductController::class)->names('api.admin.products');
    });
});



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

