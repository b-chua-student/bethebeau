@extends('layouts.admin')

@section('title', 'Create Order')

@section('content')
<div class="container mx-auto max-w-4xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to Order Management
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Create Manual Order</h1>
    </div>

    <form method="POST" action="{{ route('admin.orders.store') }}" class="space-y-8">
        @csrf

        <!-- Customer & Logistics Card -->
        <div class="border border-gray-100 bg-white p-8 shadow-sm">
            <h3 class="mb-6 text-xs font-bold uppercase tracking-[0.2em] text-gray-400">General Information</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- User Selection -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Customer</label>
                    <select name="user_id" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Shipping Address -->
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Shipping Address</label>
                    <textarea name="shipped_to" rows="2" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('shipped_to') }}</textarea>
                </div>

                <!-- Order Status -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Order Status</label>
                    <select name="status" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none text-orange-600 font-bold uppercase tracking-tighter">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <!-- Final Total -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Grand Total (₱)</label>
                    <input type="number" name="total_price" value="{{ old('total_price') }}" step="0.01" placeholder="0.00"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm font-bold text-gray-900 focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
                </div>
            </div>
        </div>

        <!-- Order Items Card -->
        <div class="border border-gray-100 bg-white p-8 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Order Items</h3>
                <button type="button" onclick="addItem()" class="text-[10px] font-bold uppercase tracking-widest text-[var(--brand-color)] hover:underline">
                    + Add Product Row
                </button>
            </div>

            <div id="order-items" class="space-y-4">
                <div class="item-row grid grid-cols-1 gap-4 border-b border-gray-50 pb-4 md:grid-cols-12 md:items-end">
                    <div class="md:col-span-6">
                        <label class="mb-2 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Product</label>
                        <select name="items[0][product_id]" class="w-full border border-gray-200 bg-white px-3 py-2 text-xs outline-none">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} - ₱{{ number_format($product->price, 2) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="mb-2 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Quantity</label>
                        <input type="number" name="items[0][quantity]" min="1" placeholder="1" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none">
                    </div>
                    <div class="md:col-span-4">
                        <label class="mb-2 block text-[8px] font-bold uppercase tracking-widest text-gray-400">Unit Price override</label>
                        <input type="number" name="items[0][unit_price]" step="0.01" placeholder="0.00" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none">
                    </div>
                </div>
            </div>
        </div>

        <!-- Errors -->
        @if ($errors->any())
            <div class="bg-red-50 p-4 border-l-4 border-red-500">
                <ul class="list-inside list-disc text-xs font-medium text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-[var(--brand-color)] py-5 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
            Finalize and Create Order
        </button>
    </form>
</div>

<script>
let index = 1;
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
            <input type="number" name="items[${index}][quantity]" min="1" placeholder="1" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none">
        </div>
        <div class="md:col-span-4">
            <input type="number" name="items[${index}][unit_price]" step="0.01" placeholder="0.00" class="w-full border border-gray-200 px-3 py-2 text-xs outline-none">
        </div>
    `;
    container.appendChild(div);
    index++;
}
</script>
@endsection
