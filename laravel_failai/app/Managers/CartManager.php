<?php

namespace App\Managers;

use App\Http\Requests\CartRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Model;

class CartManager
{
    public function __construct(
        protected ProductsManager $productsManager
    ) {
    }


    /**
     * @throws Exception
     */
    public function addToCart(CartRequest $request): void
    {
        $cart = $this->getCart();

        $product = $this->productsManager->getById($request->product_id);

        $cartItem = $this->getCartItem($cart, $product);

        if (!$cart->id) {
            throw new Exception('Cart not found');
        }

        if (!$cartItem) {
            $cartItem               = new OrderDetails();
            $cartItem->order_id     = $cart->id;
            $cartItem->product_id   = $product->id;
            $cartItem->product_name = $product->name;
            $cartItem->quantity     = $request->quantity;
            $cartItem->price        = $product->price;
            $cartItem->save();
            return;
        }

        $cartItem->increment('quantity', $request->quantity);
    }

    private function getCart(): Order
    {
        /** @var User $user */
        $user = auth()->user();
        return $user?->getLatestCart() ?? new Order();
    }

    public function changeQuantity(Product $product, int $quantity): void
    {
        $userCart = $this->getCart();

        $cartItem = $this->getCartItem($userCart, $product);

        $cartItem->quantity = $quantity;
        $cartItem->save();
    }

    public function removeFromCart(Product $product): void
    {
        $userCart = $this->getCart();

        $cartItem = $this->getCartItem($userCart, $product);

        $cartItem?->delete();
    }

    public function getCartItem(Order $cart, Model|Product $product): ?OrderDetails
    {
        return OrderDetails::where([
            'order_id'   => $cart->id,
            'product_id' => $product->id,
        ])->first() ?? null;
    }
}
