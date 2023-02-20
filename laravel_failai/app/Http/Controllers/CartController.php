<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;

class CartController extends Controller
{
    public function create(CartRequest $request)
    {
        $manager = new OrderDetails(); // Suemuliavau OrderDetail Managerį

        $duomenys = $request->all();
        /** @var User $user */
        $user     = auth()->user();         // Siuo metu prisijunges vartotojas

        // Paimame vartotojo paskutinį krepšelį ir priskiriam i masyva saugojimui
        $duomenys['order_id']     = $user->getLatestCart()->id;
        $product                  = Product::find($request->product_id);
        $duomenys['product_name'] = $product->name;    // Paimame produkto pavadinima ir priskiriam i masyva saugojimui
        $duomenys['price']        = $product->price;   // Paimame produkto kaina ir priskiriam i masyva saugojimui

        $manager->create($duomenys); // Sukuriu naują OrderDetail įrašą

        return redirect()->back()->with('success', __('messages.product_added_to_cart'));
    }
}
