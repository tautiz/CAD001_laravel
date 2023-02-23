<?php

namespace App\Listeners;

use App\Events\OrderCreated;

class SendNotificationToManager
{
    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        $order = $event->getOrder();

        // siusti laiska vadybininkui su sablonu new_order.blade.php i sita templeita dedam $order kintamaji
        // siusti sms vadybininkui su tekstu "Naujas uzsakymas nr. $order->id"
    }
}
