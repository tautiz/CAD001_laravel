<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Įkeliame failą į /tmp/ aplanką
            $image = $request->file('foto');

            // Gaunamas paveikslelio pavadinimą
            $clientOriginalName = $image->getClientOriginalName();

            // Atlieka /tml/phpHG948fWRFG paveikslelio perkelima į public/img/products katalogą
            $image->move(public_path('img/products'), $clientOriginalName);

            // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
            $product->image = '/img/products/'. $clientOriginalName;
            $product->save();
        }

        return redirect()->route('products.show', $product);
    }

    public function create()
    {
        return view('products.create_edit');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.create_edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Įkeliame failą į /tmp/ aplanką
            $image = $request->file('foto');

            // Gaunamas paveikslelio pavadinimą
            $clientOriginalName = $image->getClientOriginalName();

            // Atlieka /tml/phpHG948fWRFG paveikslelio perkelima į public/img/products katalogą
            $image->move(public_path('img/products'), $clientOriginalName);

            // Ši kodo dalis atsakinga uz paveiksliuko isaugojima produkto lenteleje
            $product->image = '/img/products/'. $clientOriginalName;
            $product->save();
        }

        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
