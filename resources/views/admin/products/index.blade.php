@extends('layouts.admin')

@section('title', 'Product Management')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Header -->
    <div class="flex items-end justify-between">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">Product Management</h1>
            <p class="mt-2 text-sm text-gray-500">Manage your inventory, pricing, and product visibility.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-[var(--brand-color)] px-6 py-3 text-xs font-bold uppercase tracking-widest !text-white !hover:opacity-90 !transition-opacity">
            Add New Product
        </a>
    </div>

    <!-- Search Section -->
    <div class="bg-white p-6 border border-gray-100 shadow-sm">
        <x-search-form route='product-management'/>
    </div>

    <!-- Table Container -->
    <div class="border border-gray-100 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1300px]">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Product Info</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($products as $product)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-400">#{{ $product->id }}</td>

                        <!-- Name & Slug -->
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">{{ $product->name }}</p>
                            <p class="text-[10px] text-gray-400 uppercase tracking-tighter">{{ $product->slug }}</p>
                        </td>

                        <!-- Truncated Description -->
                        <td class="px-6 py-4">
                            <p class="max-w-[250px] truncate text-xs text-gray-500" title="{{ $product->description }}">
                                {{ $product->description }}
                            </p>
                        </td>

                        <!-- Category -->
                        <td class="px-6 py-4">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-600 bg-gray-100 px-2 py-1">
                                {{ $product->category->name }}
                            </span>
                        </td>

                        <!-- Price -->
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">
                            ₱{{ number_format($product->price, 2) }}
                        </td>

                        <!-- Stock Level -->
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="text-sm {{ $product->stock <= 5 ? 'text-red-500 font-bold' : 'text-gray-600' }}">
                                    {{ $product->stock }}
                                </span>
                                @if($product->stock <= 5)
                                    <span class="text-[8px] uppercase font-black text-red-500">Low</span>
                                @endif
                            </div>
                        </td>

                        <!-- Active Toggle -->
                        <td class="px-6 py-4">
                            <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-tighter
                                {{ $product->is_active ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-400' }}">
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-4">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-xs font-bold uppercase tracking-widest text-gray-600 hover:text-black">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
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
