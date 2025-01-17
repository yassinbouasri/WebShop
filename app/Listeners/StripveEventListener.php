<?php

namespace App\Listeners;

use App\Actions\WebShop\HandleCheckoutSessionCompleted;
use Laravel\Cashier\Events\WebhookReceived;

class StripveEventListener
{

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'checkout.session.completed') {
            {
                (new HandleCheckoutSessionCompleted())->handle($event->payload['object']['id']);
            }
        }
    }
}
