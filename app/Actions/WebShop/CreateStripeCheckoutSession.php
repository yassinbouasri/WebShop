<?php

declare(strict_types=1);


namespace App\Actions\WebShop;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart)
    {
        return $cart->user
            ->allowPromotionCodes()
            ->checkout(
            $this->formatCartItems($cart->items),
                [
                    'customer_update' => [
                        'shipping' => 'auto',
                    ],
                    'shipping_address_collection' => [
                        'allowed_countries' => ['US', 'NL']
                    ],
                    'metadata' => [
                        'user_id' => $cart->user->id
                    ]
                ],
        );
    }

    /**
     * @return array[]
     */
    public function formatCartItems(Collection $items): array
    {
        return  $items->loadMissing(['product', 'variant'])->map(function (CartItem $item) {
            return
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'unit_amount' => $item->product->price->getAmount(),
                        'product_data' => [
                            'name' => $item->product->name,
                            'description' => 'Size: ' . $item->variant->size . ' Color: ' . $item->variant->color,
                            'metadata' => [
                                'product_id' => $item->product->id,
                                'product_variant_id' => $item->product_variant_id,
                            ]
                        ]
                    ],
                    'quantity' => $item->quantity,
                ];
        })->toArray();
    }
}
