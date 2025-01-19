<div class="grid grid-cols-2 gap-4">
    <x-panel class="col-span-2" title="Order Details #{{ $this->order->id }}">
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left">Product</th>
                <th class="text-left">Quantity</th>
                <th class="text-right">Total</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($this->order->items as $item)
                <tr>
                    <td>
                        {{ $item->name }} <br>
                        {{ $item->description }}
                    </td>
                    <td>
                        {{ $item->quantity }}
                    </td>
                    <td class="text-right">
                        {{ $item->amount_total }}
                    </td>
                </tr>
            @endforeach
            <tfoot>
            @if($this->order->amount_shipping->isPositive())
                <tr>
                    <td colspan="2" class="text-right font-medium">Shipping:</td>
                    <td class="font-medium text-right">{{ $this->order->amount_shipping }}</td>
                    <td></td>
                </tr>
            @endif
            @if($this->order->amount_tax->isPositive())

                <tr>
                    <td colspan="2" class="text-right font-medium">Tax:</td>
                    <td class="font-medium text-right">{{ $this->order->amount_tax }}</td>
                    <td></td>
                </tr>
            @endif
            <tr>
                <td colspan="2" class="text-right font-medium">Subtotal:</td>
                <td class="font-medium text-right">{{ $this->order->amount_subtotal }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-medium">Total:</td>
                <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </x-panel>
    <x-panel class="col-span-1" title="Billing Address">
        @foreach ($this->order->billing_address->filter() as $line)
            {{ $line }} <br>
        @endforeach
    </x-panel>
    <x-panel class="col-span-1" title="Shipping Address">
        @foreach ($this->order->shipping_address->filter() as $line)
            {{ $line }} <br>
        @endforeach
    </x-panel>
</div>

