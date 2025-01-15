<?php

declare(strict_types=1);


namespace App\Actions\WebShop;

use App\Models\Cart;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        if(auth()->guest())
        {
            $cart = Cart::firstOrCreate([
                'session_id' => session()->getId(),
            ]);
        }

        if(auth()->user())
        {
            $cart = auth()->user()->cart ?: auth()->user()->cart()->create();
        }
        dd($cart);
    }
}
