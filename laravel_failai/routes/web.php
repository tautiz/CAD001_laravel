<?php

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
    return Product::firstOrCreate(
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
});

Route::get('/products', function () {
    return Product::all();
});

Route::get('/products-del', function () {
    return Product::all()->map(function ($product) {
        $product->delete();
    });
});

Route::get('/new-product', function () {
    return ProductFactory::new()->create();
});
