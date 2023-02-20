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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::group(['middleware' => SetLocale::class], function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('product/add', [CartController::class, 'create'])->name('product.add_to_cart');
    Route::get('cart', [CartController::class, 'show'])->name('order.cart');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
        Route::get('/', DashBoardController::class)->name('dashboard');
        Route::delete('/product/file/{file}', [ProductsController::class, 'destroyFile'])->name('product.destroy-file');
        Route::resources([
            'products'     => ProductsController::class,
            'categories'   => CategoriesController::class,
            'orders'       => OrderController::class,
            'statuses'     => StatusController::class,
            'addresses'    => AddressController::class,
            'users'        => UserController::class,
            'persons'      => PersonController::class,
            'paymentTypes' => PaymentTypeController::class,
        ]);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

