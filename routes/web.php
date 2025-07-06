<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\Admin\SessionController as AdminSessionController;
use App\Http\Controllers\User\CartSessionController;
use App\Http\Controllers\User\SessionController as UserSessionController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;


// -------------------- Admin Routes -----------------

Route::middleware('admin')->prefix('/admin')->group(function (){
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/categories', 'admin.categories')->name('admin.categories');
    Route::resource('/products', AdminProductController::class)->names('admin.products');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::post('/orders/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    Route::delete('/logout', [AdminSessionController::class , 'destroy'])->name('admin.login.destroy');
});

Route::get('/admin/login', [AdminSessionController::class , 'create'])->name('admin.login.create');
Route::post('admin/login', [AdminSessionController::class , 'store'])->name('admin.login.store');

//-----------------------------------------------------------------------


Route::middleware('auth')->group(function (){
    Route::delete('logout', [UserSessionController::class , 'destroy'])->name('login.destroy');
    Route::get('/orders', [UserOrderController::class, 'index'])->name('user.orders.index');
    Route::get('/orders/{order}', [UserOrderController::class, 'show'])->name('user.orders.show');
    Route::post('/orders/{order}/cancel', [UserOrderController::class, 'cancel'])->name('user.orders.cancel');
     Route::post('/orders/create', [UserOrderController::class, 'create'])->name('user.orders.create');
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [UserSessionController::class , 'create'])->name('login.create');
    Route::post('/login', [UserSessionController::class , 'store'])->name('login.store');
    Route::get('/register', [RegisterController::class , 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class , 'store'])->name('register.store');
});


Route::get('/', [HomeController::class,'index'])->name('home');
Route::view('/about', 'user.about')->name('about');

Route::get('/products', [UserProductController::class,'index'])->name('products.index');
Route::get('/products/{product}', [UserProductController::class,'show'])->name('products.show');


Route::prefix('/cart')->controller(CartSessionController::class)->group(function () {

    Route::get('/', 'index')->name('user.cart.index');
    Route::post('/{product}',  'store')->name('user.cart.store');
    Route::delete('/{product}',  'destroy')->name('user.cart.destroy');

});



