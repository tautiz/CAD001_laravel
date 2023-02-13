<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $latestOrders = Order::latest()->take(5)->get();
        $latestProducts = Product::latest()->take(5)->get();
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('latestOrders', 'latestProducts', 'latestUsers'));
    }
}
