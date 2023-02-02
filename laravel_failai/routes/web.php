<?php

use App\Models\Order;
use App\Models\Product;
use Database\Factories\ProductFactory;
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


Route::get('/product/{id}', function ($id) {
    $product = Product::firstOrCreate(
        [
            'id' => $id
        ],
        [
            'name' => 'Londonas to Paris',
            'category_id' => 5,
            'price' => 1000,
            'status_id' => 5,
            'slug' => 'london-to-parisasdfgh',
            'description' => 'London to Paris',
            'image' => 'london-to-paris.jpg',
            'color' => 'red',
            'size' => 'XL'
        ]
    );

    return $product;
});

Route::get('/products', function () {
    return Product::query()->with(['category', 'status'])->get();
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

