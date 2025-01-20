@component('mail::message')

    Hey {{ $cart->user->name }},

    You have an abandoned cart.


@component('mail::button', ['url' => route('cart'), 'color' => 'success'])
    View Order
@endcomponent
@endcomponent
