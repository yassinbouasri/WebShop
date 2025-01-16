<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('home')">
    {{ __('Your cart') }} ({{ $this->count }})
</x-nav-link>
