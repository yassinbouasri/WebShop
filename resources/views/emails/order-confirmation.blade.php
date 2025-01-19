@component('mail::message')

    Order Confirmation

    Hi {{ $order->user->name }},

    Thank you for your order! We're excited to get it to you as soon as possible.

<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Tax</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

    @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->name }} <br> {{ $item->description }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->amount_tax }}</td>
            <td>{{ $item->amount_total }}</td>
        </tr>
    @endforeach

    </tbody>
    <tfoot>
    @if($order->amount_shipping->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Shipping Costs
            </td>
            <td colspan="4" style="text-align: right;">
                {{ $order->amount_shipping }}
            </td>
        </tr>
    @endif

    @if($order->amount_discount->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Discount
            </td>
            <td colspan="4" style="text-align: right;">
                {{ $order->amount_discount }}
            </td>
        </tr>
    @endif

    @if($order->amount_tax->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                Tax
            </td>
            <td colspan="4" style="text-align: right;">
                {{ $order->amount_tax }}
            </td>
        </tr>
    @endif

    @if($order->amount_subtotal->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                SubTotal
            </td>
            <td colspan="4" style="text-align: right;">
                {{ $order->amount_subtotal }}
            </td>
        </tr>
    @endif

    @if($order->amount_total->isPositive())
        <tr>
            <td colspan="4" style="font-weight: bold; text-align: right;">
                Total:
            </td>
            <td colspan="4" style="font-weight: bold; text-align: right;">
                {{ $order->amount_total }}
            </td>
        </tr>
    @endif
    </tfoot>

</table>

@endcomponent
