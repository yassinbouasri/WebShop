@props(['title' => false])
<div {{ $attributes->class(['bg-white rounded-lg shadow p-4 space-y-2' ]) }} >
    @if($title)
        <h2 class="text-lg font-medium">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>
