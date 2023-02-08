<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'shipping_address_id' => ['required', 'exists:addresses,id'],
            'billing_address_id' => ['required', 'exists:addresses,id'],
            'status_id' => ['required', 'exists:statuses,id'],
        ]);

        $order = Order::create($request->all());
        return redirect()->route('order.show', $order);
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('order.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }
}
