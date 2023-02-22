<?php

namespace App\Managers;

use App\Http\Requests\CartRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use Exception;

class CartManager
{
    /**
     * @throws Exception
     */
    public function addToCart(CartRequest $request): void
    {
        $cart = $this->getCart();

        $product = Product::find($request->product_id);

        $cartItem = OrderDetails::where([
            'order_id'   => $cart->id,
            'product_id' => $product->id,
        ])->first();

        if (!$cart->id) {
            throw new Exception('Cart not found');
        }

        if (!$cartItem) {
            $cartItem = new OrderDetails();
            $cartItem->order_id = $cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->product_name = $product->name;
            $cartItem->quantity = $request->quantity;
            $cartItem->price = $product->price;
            $cartItem->save();
            return;
        }

        $cartItem->increment('quantity', $request->quantity);
    }

    public function changeQuantity(Product $product, int $quantity): void
    {

        $cart = $this->getCart();

        $cartItem = OrderDetails::where([
            'order_id'   => $cart->id,
            'product_id' => $product->id,
        ])->first();

        if (!$cartItem) {
            return;
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();
    }

    public function removeFromCart(Product $product): void
    {
        $cart = $this->getCart();

        $cartItem = OrderDetails::where([
            'order_id'   => $cart->id,
            'product_id' => $product->id,
        ])->first();

        $cartItem?->delete();
    }

    /**
     * @return Order
     */
    private function getCart(): Order
    {
        // Siuo metu prisijunges vartotojas
        /** @var User $user */
        $user = auth()->user();
        $cart = $user?->getLatestCart() ?? new Order();
        return $cart;
    }
}
