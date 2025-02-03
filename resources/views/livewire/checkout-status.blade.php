<x-panel>
    @if ($this->order)
        <p>
            Thank you for your order (#{{ $this->order->id }}).
        </p>
    @else
        <p wire:poll>
            Waiting for payment confirmation. Please stand by...
        </p>

    @endif
</x-panel>
