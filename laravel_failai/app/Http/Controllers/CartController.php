<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Managers\CartManager;

class CartController extends Controller
{
    public function __construct(private CartManager $manager)
    {
    }

    public function create(CartRequest $request)
    {
        $this->manager->addToCart($request);

        return redirect()->back()->with('success', __('messages.product_added_to_cart'));
    }

    public function show()
    {
        return view('order.order-summary', [
            'cart' => auth()->user()->getLatestCart(),
        ]);
    }
}
