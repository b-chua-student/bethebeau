@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Breadcrumb / Back Link -->
    <a href="{{ route('app.product-listing') }}" class="mb-8 inline-flex items-center text-sm font-medium text-gray-500 hover:text-[var(--brand-color)]">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Back to Products
    </a>

    <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
        <!-- Product Image Section -->
        <div class="bg-gray-100 aspect-square w-full overflow-hidden">
            <img src="{{ $product->image_url ?? asset('img/placeholder.jpg') }}"
                 alt="{{ $product->name }}"
                 class="h-full w-full object-cover">
        </div>

        <!-- Product Information Section -->
        <div class="flex flex-col">
            <span class="mb-2 text-sm font-bold uppercase tracking-widest text-[var(--brand-color)]">
                {{ $product->category->name }}
            </span>
            <h1 class="mb-4 text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

            <p class="mb-6 text-2xl font-semibold text-gray-800">
                ₱{{ number_format($product->price, 2) }}
            </p>

            <div class="mb-8 border-t border-b border-gray-100 py-6">
                <h3 class="mb-2 text-sm font-bold uppercase text-gray-400">Description</h3>
                <p class="leading-relaxed text-gray-600">
                    {{ $product->description }}
                </p>
            </div>

            <!-- Add to Cart Form -->
            <form method="POST" action="{{ route('app.add-to-cart') }}" class="mt-auto">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                <div class="mb-4 flex items-center gap-4">
                    <span class="text-sm font-medium text-gray-500">Stock: {{ $product->stock }} available</span>
                </div>

                <div class="flex flex-wrap gap-4">
                    <!-- Quantity Selector -->
                    <div class="flex h-12 items-center border border-gray-300">
                        <button type="button" onclick="decrement()" class="px-4 py-2 hover:bg-gray-100 focus:outline-none">-</button>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" id="quantity"
                               class="w-12 border-none bg-transparent text-center focus:ring-0 [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">
                        <button type="button" onclick="increment()" class="px-4 py-2 hover:bg-gray-100 focus:outline-none">+</button>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="flex-1 bg-[var(--brand-color)] px-8 py-3 font-bold text-white transition-opacity hover:opacity-90 disabled:bg-gray-300"
                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                        {{ $product->stock > 0 ? 'Add to Cart' : 'Out of Stock' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const qtyInput = document.getElementById('quantity');
    function increment() { qtyInput.stepUp(); }
    function decrement() { qtyInput.stepDown(); }
</script>
@endsection
