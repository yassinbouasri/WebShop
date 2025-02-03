<?php

namespace App\Listeners;

use App\Actions\WebShop\HandleCheckoutSessionCompleted;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {

        if ($event->payload['type'] === 'checkout.session.completed') {
            {
                (new HandleCheckoutSessionCompleted())->handle($event->payload['data']['object']['id']);
            }
        }
    }
}
