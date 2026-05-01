@extends('layouts.admin')

@section('title', 'Order Management')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Header Area -->
    <div class="flex items-end justify-between">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">Order Management</h1>
            <p class="mt-2 text-sm text-gray-500">Track, edit, and manage customer transactions.</p>
        </div>
        <a href="{{ route('admin.orders.create') }}" class="bg-[var(--brand-color)] px-6 py-3 text-xs font-bold uppercase tracking-widest !text-white !hover:opacity-90 !transition-opacity">
            Add New Order
        </a>
    </div>

    <!-- Filters & Search -->
    <div class="bg-white p-6 border border-gray-100 shadow-sm">
        <x-search-form route='orders-management'/>
    </div>

    <!-- Data Table -->
    <div class="border border-gray-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1200px]">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Shipping Details</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Total Price</th>
                        <th class="px-6 py-4">Items</th>
                        <th class="px-6 py-4">Dates</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-400">{{ $loop->iteration }}</td>

                        <!-- Customer Info -->
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">{{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                            <p class="text-xs text-gray-500">{{ $order->email }}</p>
                        </td>

                        <!-- Shipping -->
                        <td class="px-6 py-4">
                            <p class="max-w-[200px] truncate text-xs text-gray-600" title="{{ $order->shipped_to }}">
                                {{ $order->shipped_to }}
                            </p>
                        </td>

                        <!-- Status Badge -->
                        <td class="px-6 py-4">
                            <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-tighter
                                @if($order->status === 'completed') bg-green-50 text-green-600
                                @elseif($order->status === 'pending') bg-orange-50 text-orange-600
                                @else bg-gray-100 text-gray-600 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>

                        <!-- Price -->
                        <td class="px-6 py-4 text-right text-sm font-bold text-gray-900">
                            ₱{{ number_format($order->total_price, 2) }}
                        </td>

                        <!-- Nested Items -->
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                @foreach ($order->items as $item)
                                    <a href="{{ route('search.product-management', ['query' => $item->product->name]) }}"
                                       class="text-[10px] font-medium uppercase text-[var(--brand-color)] hover:underline">
                                        {{ $item->product->name }} <span class="text-gray-400">x{{ $item->quantity }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </td>

                        <!-- Dates -->
                        <td class="px-6 py-4">
                            <div class="text-[10px] uppercase tracking-tighter text-gray-400">
                                <p>Placed: {{ $order->ordered_at }}</p>
                                <p>Updated: {{ $order->updated_at }}</p>
                            </div>
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-4">
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-xs font-bold uppercase tracking-widest text-gray-600 hover:text-black">
                                    Edit
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold uppercase tracking-widest text-red-500 hover:text-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
