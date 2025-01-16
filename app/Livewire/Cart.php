<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{
    public function getItemsProperty()
    {
        return CartFactory::make()->items()->get();
    }

    public function decrement($itemId)
    {
        $item = CartFactory::make()->items()->find($itemId);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }

    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->find($itemId)?->increment('quantity');
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->find($itemId)->delete();

        $this->dispatch('itemRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
