@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="font-seasons-italic mb-10 text-4xl text-gray-900">Checkout</h1>

    <form method="POST" action="{{ route('app.process-checkout') }}">
        @csrf
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">

            <!-- Left Column: Shipping Details -->
            <div class="lg:col-span-2">
                <div class="border border-gray-100 bg-white p-8 shadow-sm">
                    <h3 class="mb-6 text-lg font-bold uppercase tracking-widest text-gray-900 border-b border-gray-100 pb-4">
                        Shipping Details
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-400">Shipping Address</label>
                            <textarea
                                name="shipped_to"
                                rows="3"
                                class="w-full border border-gray-200 bg-white p-4 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none"
                                placeholder="Enter your full delivery address..."
                                required
                            >{{ $user->address }}</textarea>
                        </div>

                        <!-- Order Items Mini-Table -->
                        <div class="mt-10">
                            <h3 class="mb-6 text-lg font-bold uppercase tracking-widest text-gray-900 border-b border-gray-100 pb-4">
                                Items in Order
                            </h3>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                                            <th class="pb-4">Product</th>
                                            <th class="pb-4">Qty</th>
                                            <th class="pb-4 text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @foreach ($items as $item)
                                        <tr>
                                            <td class="py-4">
                                                <p class="text-sm font-medium text-gray-900">{{ $item->product->name }}</p>
                                                <p class="text-[10px] text-gray-400 uppercase">₱{{ number_format($item->product->price, 2) }} each</p>
                                            </td>
                                            <td class="py-4 text-sm text-gray-600">x{{ $item->quantity }}</td>
                                            <td class="py-4 text-right text-sm font-bold text-gray-900">
                                                ₱{{ number_format($item->product->price * $item->quantity, 2) }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Final Totals -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 p-8 shadow-sm sticky top-8">
                    <h3 class="mb-6 text-lg font-bold uppercase tracking-widest text-gray-900">Final Summary</h3>

                    <div class="space-y-4 border-b border-gray-200 pb-6 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>₱{{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping Fee</span>
                            <span>₱{{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Tax (12%)</span>
                            <span>₱{{ number_format($tax, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-between text-xl font-bold text-gray-900">
                        <span>Total</span>
                        <span class="text-[var(--brand-color)]">₱{{ number_format($total, 2) }}</span>
                    </div>

                    <button type="submit"
                            class="mt-8 block w-full bg-[var(--brand-color)] py-4 text-center text-sm font-bold uppercase tracking-widest text-white hover:opacity-90">
                        Place Order
                    </button>

                    <p class="mt-4 text-center text-[10px] uppercase tracking-widest text-gray-400">
                        By placing this order, you agree to our terms
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
