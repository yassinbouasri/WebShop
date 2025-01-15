<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $productId; //instead of passing producId as a parameter

    public function mount($productId)
    {

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
