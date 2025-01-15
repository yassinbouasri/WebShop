<div class="grid grid-cols-4 gap-4">
    @foreach ($this->products as $product)
        <div class="bg-white rounded-lg shadow p-4 relative">
            <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ $product->image->path }}" alt="">
            <h2 class="font-medium text-lg">{{ $product->name }}</h2>
            <span class="text-gray-700 text-sm"> {{ $product->price }}</span>
        </div>


    @endforeach
</div>
