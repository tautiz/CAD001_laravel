<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        Log::info('Order created: ' . $order->id);
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        Log::info('Order updated: ' . $order->id);
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        Log::info('Order deleted: ' . $order->id);
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        Log::info('Order restored: ' . $order->id);
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        Log::info('Order force deleted: ' . $order->id);
    }
}
