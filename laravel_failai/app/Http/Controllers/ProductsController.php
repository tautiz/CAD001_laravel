<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products =  Product::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:255'],
            'price' => ['required','integer'],
            'category_id' => ['required','integer'],
            'status_id' => ['required','integer'],
            'slug' => ['required','max:255'],

            'description' => ['nullable', 'string'],
            'image' => ['nullable'],
            'color' => ['nullable'],
            'size' => ['nullable'],
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.show', $product);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);

    }

    public function edit(Product $product)
    {
        return view('products.create_edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required','size:255'],
            'price' => ['required','integer'],
            'category_id' => ['required','integer'],
            'status_id' => ['required','integer'],
            'slug' => ['required','size:255'],

            'description' => ['nullable', 'string'],
            'image' => ['nullable'],
            'color' => ['nullable'],
            'size' => ['nullable'],
        ]);

        $product->update($request->all());
        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
