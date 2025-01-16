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
