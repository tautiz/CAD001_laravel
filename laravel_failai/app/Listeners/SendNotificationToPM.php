<?php

namespace App\Listeners;

use App\Events\OrderUpdated;
use Illuminate\Support\Facades\Log;

class SendNotificationToPM
{
    /**
     * Handle the event.
     */
    public function handle(OrderUpdated $event): void
    {
        Log::info('SendNotificationToPM Order updated: ' . $event->order->id);
    }
}
