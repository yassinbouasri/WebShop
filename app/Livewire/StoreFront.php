<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class StoreFront extends Component
{
    public function getProductsProperty(): Collection
    {
        return Product::query()->get();
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
