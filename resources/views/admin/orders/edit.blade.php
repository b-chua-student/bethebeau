@extends('layouts.admin')

@section('title', 'Edit Order')

@section('content')
<div class="container mx-auto max-w-4xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to Order Management
        </a>
        <div class="mt-4 flex items-center justify-between">
            <h1 class="font-seasons-italic text-4xl text-gray-900">Edit Order</h1>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Order ID: #{{ $order->id }}</span>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- General Info Card -->
        <div class="border border-gray-100 bg-white p-8 shadow-sm">
            <h3 class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Order Logistics</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- User -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Customer</label>
                    <select name="user_id" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ (old('user_id', $order->user_id) == $user->id) ? 'selected' : '' }}>
                                {{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Shipping Address -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Shipping Address</label>
                    <textarea name="shipped_to" rows="2" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('shipped_to', $order->shipped_to) }}</textarea>
                </div>

                <!-- Status -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Order Status</label>
                    <select name="status" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm font-bold uppercase tracking-tighter focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        @foreach (['pending','confirmed','processing','shipped','delivered','cancelled','refunded','failed'] as $status)
                            <option value="{{ $status }}" {{ old('status', $order->status) === $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Total -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Grand Total (₱)</label>
                    <input type="number" name="total_price" value="{{ old('total_price', $order->total_price) }}" step="0.01"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm font-bold text-gray-900 focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
                </div>
            </div>
        </div>

        <!-- Order Items Card -->
        <div class="border border-gray-100 bg-white p-8 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Order Items</h3>
                <button type="button" onclick="addItem()" class="text-[10px] font-bold uppercase tracking-widest text-[var(--brand-color)] hover:underline">
                    + Add New Item Row
                </button>
            </div>

            <div id="order-items" class="space-y-4">
                @foreach ($order->items as $index => $item)
                <div class="item-row grid grid-cols-1 gap-4 border-b border-gray-50 pb-4 md:grid-cols-12 md:items-end">
                    <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item->id }}"/>

                    <div class="md:col-span-6">
                        <label class="mb-1 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Product</label>
                        <select name="items[{{ $index }}][product_id]" class="w-full border border-gray-200 bg-white px-3 py-2 text-xs outline-none">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} - ₱{{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-1 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Qty</label>
                        <input type="number" name="items[{{ $index }}][quantity]" value="{{ $item->quantity }}" min="1"
                               class="w-full border border-gray-200 px-3 py-2 text-xs outline-none font-medium">
                    </div>

                    <div class="md:col-span-4">
                        <label class="mb-1 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Unit Price</label>
                        <input type="number" name="items[{{ $index }}][unit_price]" value="{{ $item->unit_price }}" step="0.01"
                               class="w-full border border-gray-200 px-3 py-2 text-xs outline-none font-medium">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Submit -->
        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-[var(--brand-color)] py-5 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
                Update Order Record
            </button>
        </div>
    </form>
</div>

<script>
let index = {{ $order->items->count() }};
function addItem() {
    const container = document.getElementById('order-items');
    const div = document.createElement('div');
    div.classList.add('item-row', 'grid', 'grid-cols-1', 'gap-4', 'border-b', 'border-gray-50', 'pb-4', 'md:grid-cols-12', 'md:items-end', 'pt-4');
    div.innerHTML = `
        <div class="md:col-span-6">
            <select name="items[${index}][product_id]" class="w-full border border-gray-200 bg-white px-3 py-2 text-xs outline-none">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - ₱{{ number_format($product->price, 2) }}</option>
                @endforeach
            </select>
        </div>
        <div class="md:col-span-2">
            <input type="number" name="items[${index}][quantity]" placeholder="Qty" min="1" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none font-medium">
        </div>
        <div class="md:col-span-4">
            <input type="number" name="items[${index}][unit_price]" step="0.01" placeholder="Price" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none font-medium">
        </div>
    `;
    container.appendChild(div);
    index++;
}
</script>
@endsection
