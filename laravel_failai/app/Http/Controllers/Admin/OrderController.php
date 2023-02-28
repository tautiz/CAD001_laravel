<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Status;

class OrderController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Order::class);
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        $order = Order::create(
            $request->all()
            + [
                'status_id' => Status::query()->where(['type' => 'order', 'name' => Status::STATE_NEW])->first()->id,
            ],
        );

        $this->dispatch(new OrderCreated($order));

        return redirect()->route('orders.show', $order);
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('orders.show', $order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }
}
