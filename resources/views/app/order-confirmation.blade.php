@extends('layouts.app')

@section('title', 'Order Confirmation')

@section('content')
<div class="container mx-auto max-w-3xl px-4 py-16">
    <!-- Success Header -->
    <div class="mb-12 text-center">
        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-green-50 text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h1 class="font-seasons-italic mb-2 text-4xl text-gray-900">Thank you for your order!</h1>
        <p class="text-gray-500">Your order has been placed successfully and is being processed.</p>
        <p class="mt-2 text-sm font-bold uppercase tracking-widest text-[var(--brand-color)]">Order ID: #{{ $order->id }}</p>
    </div>

    <div class="space-y-8">
        <!-- Order Items -->
        <div class="border border-gray-100 bg-white p-8 shadow-sm">
            <h3 class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Order Summary</h3>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-50 text-[10px] font-bold uppercase text-gray-400">
                        <th class="pb-4">Product</th>
                        <th class="pb-4 text-center">Qty</th>
                        <th class="pb-4 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($order->items as $item)
                    <tr>
                        <td class="py-4">
                            <p class="text-sm font-medium text-gray-900">{{ $item->product->name }}</p>
                            <p class="text-[10px] text-gray-400">₱{{ number_format($item->unit_price, 2) }} unit price</p>
                        </td>
                        <td class="py-4 text-center text-sm text-gray-600">{{ $item->quantity }}</td>
                        <td class="py-4 text-right text-sm font-bold text-gray-900">
                            ₱{{ number_format($item->unit_price * $item->quantity, 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Financial Totals -->
            <div class="mt-8 space-y-3 border-t border-gray-50 pt-6 text-sm">
                <div class="flex justify-between text-gray-500">
                    <span>Subtotal</span>
                    <span>₱{{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-500">
                    <span>Shipping</span>
                    <span>₱{{ number_format($shipping, 2) }}</span>
                </div>
                <div class="flex justify-between text-gray-500">
                    <span>Tax (12%)</span>
                    <span>₱{{ number_format($tax, 2) }}</span>
                </div>
                <div class="flex justify-between text-lg font-bold text-gray-900 pt-2">
                    <span>Total Paid</span>
                    <span class="text-[var(--brand-color)]">₱{{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Delivery & Status Details -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="border border-gray-100 bg-white p-6 shadow-sm">
                <h3 class="mb-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Shipping Address</h3>
                <p class="text-sm leading-relaxed text-gray-600">{{ $order->shipped_to }}</p>
            </div>
            <div class="border border-gray-100 bg-white p-6 shadow-sm">
                <h3 class="mb-3 text-[10px] font-bold uppercase tracking-widest text-gray-400">Order Status</h3>
                <span class="inline-block rounded-full bg-orange-50 px-3 py-1 text-[10px] font-bold uppercase tracking-tighter text-orange-600">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>

        <!-- Navigation -->
        <div class="pt-8 text-center">
            <a href="{{ route('app.profile.orders') }}"
               class="inline-block bg-[var(--brand-color)] px-10 py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90">
               Track Your Order
            </a>
        </div>
    </div>
</div>
@endsection
