@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Header & Search Section -->
    <div class="mb-10 flex flex-col items-center justify-between gap-6 md:flex-row">
        <h1 class="font-seasons-italic text-4xl text-[var(--brand-color)]">Our Collection</h1>
        <div class="w-full max-w-md">
            <x-search-form route='product-listing'/>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($products as $product)
        <div class="group flex flex-col overflow-hidden border border-gray-100 bg-white shadow-sm transition-shadow hover:shadow-md">
            <!-- Product Image Placeholder -->
            <div class="relative aspect-square w-full bg-gray-100">
                <img src="{{ $product->image_url ?? asset('img/placeholder.jpg') }}"
                     alt="{{ $product->name }}"
                     class="h-full w-full object-cover">
                <span class="absolute left-2 top-2 bg-white px-2 py-1 text-xs font-medium uppercase tracking-wider text-gray-600">
                    {{ $product->category->name }}
                </span>
            </div>

            <!-- Product Details -->
            <div class="flex flex-1 flex-col p-5">
                <h2 class="mb-1 text-xl font-semibold text-gray-900">{{ $product->name }}</h2>
                <p class="mb-4 line-clamp-2 flex-1 text-sm text-gray-500">
                    {{ $product->description }}
                </p>

                <div class="mt-auto flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase text-gray-400">Price</p>
                        <p class="text-lg font-bold text-[var(--brand-color)]">₱{{ number_format($product->price, 2) }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs uppercase text-gray-400">Stock</p>
                        <p class="text-sm font-medium {{ $product->stock > 0 ? 'text-gray-900' : 'text-red-500' }}">
                            {{ $product->stock > 0 ? $product->stock . ' units' : 'Out of Stock' }}
                        </p>
                    </div>
                </div>

                <a href="{{ route('app.view-product', $product->id) }}"
                   class="mt-6 block w-full bg-[var(--brand-color)] py-3 text-center text-sm font-bold text-white hover:opacity-90">
                    View Product
                </a>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
