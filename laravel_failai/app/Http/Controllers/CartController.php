<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartProductUpdateRequest;
use App\Http\Requests\CartRequest;
use App\Managers\CartManager;
use App\Models\Order;
use App\Models\Product;

class CartController extends Controller
{
    public function __construct(private readonly CartManager $manager)
    {
    }


    public function sukurtiUzsakyma(Request $request)
    {
        $car = new Order();
        $car->user_id = Auth::user()->id;
        $car->status = Order::STATUS_NEW;
        $car->billing_address_id = $request->billing_address_id;
        $car->shipping_address_id = $request->shipping_address_id;
        $car->save();

        foreach ($request->cartItems as $cartItem) {
            $this->manager->addToCart($cartItem);
        }

        return redirect()->back()->with('success', __('messages.product_added_to_cart'));
    }


    public function create(CartRequest $request)
    {
        $this->manager->addToCart($request);

        return redirect()->back()->with('success', __('messages.product_added_to_cart'));
    }

    public function show()
    {
        return view('order.order-summary', [
            'cart' => auth()->user()?->getLatestCart() ?? new Order(),
        ]);
    }

    public function update(CartProductUpdateRequest $request, Product $product)
    {
        $this->manager->changeQuantity($product, $request->quantity);

        return redirect()->back()->with('success', __('messages.cart_updated', ['product' => $product->name]));
    }

    public function destroy(Product $product)
    {
        $this->manager->removeFromCart($product);

        return redirect()->back()->with('success', __('messages.product_removed_from_cart', ['product' => $product->name]));
    }
}
