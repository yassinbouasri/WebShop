<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class ViewOrder extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    #[Computed]
    public function order()
    {
        return auth()->user()->orders()->findOrfail($this->orderId) ?? null;
    }
    public function render()
    {
        return view('livewire.view-order');
    }
}
