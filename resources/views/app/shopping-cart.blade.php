@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="font-seasons-italic mb-10 text-4xl text-gray-900">Your Cart</h1>

    <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">
        <!-- Cart Items Table -->
        <div class="lg:col-span-2">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-xs font-bold uppercase tracking-widest text-gray-400">
                            <th class="pb-6">Product</th>
                            <th class="pb-6">Price</th>
                            <th class="pb-6">Quantity</th>
                            <th class="pb-6">Subtotal</th>
                            <th class="pb-6"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($items as $item)
                        <tr>
                            <!-- Product Details -->
                            <td class="py-6">
                                <div class="flex items-center gap-4">
                                    <div class="h-20 w-20 shrink-0 bg-gray-100">
                                        <img src="{{ $item->product->image_url ?? asset('img/placeholder.jpg') }}" class="h-full w-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">{{ $item->product->name }}</p>
                                        <p class="text-xs text-gray-400">{{ $item->product->category->name }}</p>
                                    </div>
                                </div>
                            </td>

                            <!-- Price -->
                            <td class="py-6 text-gray-600">
                                ₱{{ number_format($item->product->price, 2) }}
                            </td>

                            <!-- Quantity Control -->
                            <td class="py-6">
                                <form action="{{ route('app.update-cart', $item->id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex items-center border border-gray-200">
                                        <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}"
                                                class="px-3 py-1 hover:bg-gray-50 disabled:opacity-30" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                        <span class="w-10 text-center text-sm font-medium">{{ $item->quantity }}</span>
                                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}"
                                                class="px-3 py-1 hover:bg-gray-50">+</button>
                                    </div>
                                </form>
                            </td>

                            <!-- Subtotal -->
                            <td class="py-6 font-bold text-gray-900">
                                ₱{{ number_format($item->product->price * $item->quantity, 2) }}
                            </td>

                            <!-- Remove Action -->
                            <td class="py-6 text-right">
                                <form action="{{ route('app.remove-from-cart', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold uppercase tracking-tighter text-red-500 hover:text-red-700">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($items->isEmpty())
                <div class="py-20 text-center">
                    <p class="text-gray-400">Your cart is currently empty.</p>
                    <a href="{{ route('app.product-listing') }}" class="mt-4 inline-block text-[var(--brand-color)] font-bold underline">Continue Shopping</a>
                </div>
            @endif
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-gray-50 p-8 shadow-sm">
                <h2 class="mb-6 text-lg font-bold uppercase tracking-widest text-gray-900">Order Summary</h2>

                <div class="space-y-4 border-b border-gray-200 pb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span>₱{{ number_format($items->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Shipping</span>
                        <span class="text-xs uppercase font-bold text-green-600">Calculated at checkout</span>
                    </div>
                </div>

                <div class="mt-6 flex justify-between text-xl font-bold text-gray-900">
                    <span>Total</span>
                    <span>₱{{ number_format($items->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span>
                </div>

                <a href="{{ route('app.checkout') }}"
                   class="mt-8 block w-full bg-[var(--brand-color)] py-4 text-center text-sm font-bold uppercase tracking-widest text-white hover:opacity-90">
                    Proceed to Checkout
                </a>

                <a href="{{ route('app.product-listing') }}" class="mt-4 block text-center text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-gray-900">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
