<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentTypeController;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');

Route::group(['prefix' => 'admin'], function (){
    Route::get('/', DashBoardController::class)->name('admin.dashboard');
    Route::resources([
        'products' => ProductsController::class,
        'categories' => CategoriesController::class,
        'orders' => OrderController::class,
        'statuses' => StatusController::class,
        'addresses' => AddressController::class,
        'users' => UserController::class,
        'persons' => PersonController::class,
        'paymentTypes' => PaymentTypeController::class,
    ]);
});
