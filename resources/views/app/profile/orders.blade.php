@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="container mx-auto max-w-5xl px-4 py-12">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('app.profile.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)]">
            &larr; Back to Profile
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Order History</h1>
    </div>

    <!-- Orders Table -->
    <div class="border border-gray-100 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Ordered At</th>
                        <th class="px-6 py-4 text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse ($orders as $order)
                    <tr class="group hover:bg-gray-50/50">
                        <td class="px-6 py-5 text-sm text-gray-400">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-5 text-sm font-bold text-gray-900">
                            #{{ $order->id }}
                        </td>
                        <td class="px-6 py-5">
                            <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-tighter
                                {{ $order->status === 'completed' ? 'bg-green-50 text-green-600' : 'bg-orange-50 text-orange-600' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-sm text-gray-500">
                            {{ $order->ordered_at }}
                        </td>
                        <td class="px-6 py-5 text-right text-sm font-bold text-gray-900">
                            ₱{{ number_format($order->total_price, 2) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center text-gray-400">
                            <p>You haven't placed any orders yet.</p>
                            <a href="{{ route('app.product-listing') }}" class="mt-2 inline-block text-sm font-bold uppercase tracking-widest text-[var(--brand-color)]">
                                Start Shopping
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
