<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryProductsController extends Controller
{
    public function listProducts(Category $category)
    {
        $products = $category->products()->paginate(10);
        return view('public.category-products.list', compact('category', 'products'));
    }

    public function showProduct(Category $category, Product $product)
    {
        return view('public.category-products.product_show', compact('category', 'product'));
    }
}
