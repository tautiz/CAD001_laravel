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
use App\Http\Controllers\CategoryProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsPersonnel;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => SetLocale::class], function () {
    require __DIR__ . '/auth.php';

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::post('/tokens/create', function (Request $request) {
            $token = $request->user()->createToken($request->token_name);

            return ['token' => $token->plainTextToken];
        });
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', IsPersonnel::class]], function () {
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

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'show'])->name('order.cart');
        Route::post('product/add', [CartController::class, 'create'])->name('product.add_to_cart');
        Route::post('product/{product}/update', [CartController::class, 'update'])->name('cart.product_update');
        Route::delete('product/{product}/delete', [CartController::class, 'destroy'])->name('cart.product_remove');
    });

    Route::get('/', HomeController::class)->name('home');
    Route::get('/kontaktai', [LandingPageController::class, 'contacts'])->name('contacts');
    Route::get('/apie-mus', [LandingPageController::class, 'aboutUs'])->name('about-us');

    // WARNING: These routes must be last in this group
    Route::get('/{category:slug}', [CategoryProductsController::class, 'listProducts'])->name('category-products.list');
    Route::get('/{category:slug}/{product:slug}', [CategoryProductsController::class, 'showProduct'])->name('category-products.show');
});
