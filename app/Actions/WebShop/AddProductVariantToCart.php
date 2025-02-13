<?php

declare(strict_types=1);


namespace App\Actions\WebShop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart
{
    public function add(int $variantId, int $quantity = 1, Cart $cart = null)
    {
        ($cart ?: CartFactory::make())->items()->firstOrCreate(
            [
            'product_variant_id' => $variantId,

        ],[
            'quantity' => 0,

                ]
        )->increment('quantity');

    }
}
