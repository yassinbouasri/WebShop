<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class Product extends Component
{
    use InteractsWithBanner;
    public $productId; //instead of passing productId as a parameter in mount

    public $variant;

    public $rules = [
      'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount()
    {
        $this->variant = $this->product->variants->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );
        $this->banner('Product added to cart');
    }

    public function getProductProperty()
    {
        return \App\Models\Product::findOrFail($this->productId);
    }
    public function render()
    {
        return view('livewire.product');
    }
}
