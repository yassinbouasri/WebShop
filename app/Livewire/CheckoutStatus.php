<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Computed;
use Livewire\Component;

class CheckoutStatus extends Component
{
    public $sessionId;

    public function mount()
    {
        $this->sessionId = request()->get('session_id');
    }

    #[Computed]
    public function order()
    {
        return auth()->user()->orders()->where('stripe_checkout_session_id', $this->sessionId)->first() ?? null;
    }

    public function render()
    {
        return view('livewire.checkout-status');
    }
}
