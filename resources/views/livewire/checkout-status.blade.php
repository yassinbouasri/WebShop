<div class="bg-white rounded shadow p-5 mt-12 max-w-xl mx-auto">
    @if ($this->order)
        <p>
            Thank you for your order (#{{ $this->order->id }}).
        </p>
    @else
        <p wire:poll>
            Waiting for payment confirmation. Please stand by...
        </p>

    @endif
</div>
