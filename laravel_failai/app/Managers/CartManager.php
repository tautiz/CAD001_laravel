<?php

namespace App\Managers;

use App\Http\Requests\CartRequest;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;

class CartManager
{
    public function addToCart(CartRequest $request): void
    {
        // Siuo metu prisijunges vartotojas
        /** @var User $user */
        $user = auth()->user();

        $product = Product::find($request->product_id);

        $cartItem = OrderDetails::where([
            'order_id'   => $user->getLatestCart()->id,
            'product_id' => $product->id,
        ])->first();

        if (!$cartItem) {
            $cartItem = new OrderDetails();
            $cartItem->order_id = $user->getLatestCart()->id;
            $cartItem->product_id = $product->id;
            $cartItem->product_name = $product->name;
            $cartItem->quantity = $request->quantity;
            $cartItem->price = $product->price;
            $cartItem->save();
            return;
        }

        $cartItem->increment('quantity', $request->quantity);
    }
}
