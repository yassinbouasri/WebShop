<?php

namespace App\Livewire;

use Livewire\Component;

class ViewOrder extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderProperty()
    {
        return auth()->user()->orders()->findOrfail($this->orderId) ?? null;
    }
    public function render()
    {
        return view('livewire.view-order');
    }
}
