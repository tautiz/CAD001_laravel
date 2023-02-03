<?php

use App\Http\Controllers\ProductsController;
use App\Models\Order;
use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product/new', function () {

    $forma = '
        <form action="/product" method="POST">
            <input type="text" name="inputas1">
            <input type="text" name="inputas2">
            <input type="submit" value="SEND">
        </form>
    ';

    return $forma;
});


Route::get('/product/{product}', [ProductsController::class, 'show']);

Route::get('/products', function () {
    return Product::query()->with(['category', 'status'])->get();
});

Route::post('/product', function (Request $request) {
    return $request->all();
});

Route::get('/products-del', function () {
    return Product::all()->map(function ($product) {
        $product->delete();
    });
});

Route::get('/new-product', function () {

    $duomenys = [
        'name' => 'Apple',
        'category_id' => 5,
        'price' => 1000,
        'status_id' => 5,
        'slug' => 'apple',
        'description' => 'Mmmm..',
        'image' => 'london-to-paris.jpg',
        'color' => 'red',
        'size' => 'XL',
    ];

    $product  = Product::create($duomenys);

    dd($product);

});

Route::get('/order/{order}', function (Order $order) {
    return $order->products;
});

