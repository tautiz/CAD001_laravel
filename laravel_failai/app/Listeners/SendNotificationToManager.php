<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Support\Facades\Log;

class SendNotificationToManager
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        Log::info('SendNotificationToManager Order created: ' . $event->order->id);
    }
}
