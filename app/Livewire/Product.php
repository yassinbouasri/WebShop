<?php

namespace App\Livewire;

use App\Actions\WebShop\AddProductVariantToCart;
use Livewire\Component;

class Product extends Component
{
    public $productId; //instead of passing productId as a parameter in mount

    public $variant;

    public $rules = [
      'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount()
    {
        $this->variant = $this->getProductProperty()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );
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
