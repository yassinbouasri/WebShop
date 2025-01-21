<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class NavigationCart extends Component
{

    public $listeners = [
        'productAddedToCart' => '$refresh',
        'itemRemovedFromCart' => '$refresh',
    ];

    #[Computed]
    public function count()
    {
        return (CartFactory::make()->items()->count());
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
