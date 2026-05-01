@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="container mx-auto max-w-3xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.products.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to Products
        </a>
        <div class="mt-4 flex items-center justify-between">
            <h1 class="font-seasons-italic text-4xl text-gray-900">Edit Product</h1>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">ID: #{{ $product->id }}</span>
        </div>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Category -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Category</label>
                    <select name="category_id" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Active Status -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Visibility</label>
                    <select name="is_active" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        <option value="1" {{ old('is_active', $product->is_active) ? 'selected' : '' }}>Active (Visible in Store)</option>
                        <option value="0" {{ !old('is_active', $product->is_active) ? 'selected' : '' }}>Inactive (Hidden)</option>
                    </select>
                </div>
            </div>

            <!-- Name -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
            </div>

            <!-- Description -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Detailed Description</label>
                <textarea name="description" rows="5"
                          class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Price -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Price (₱)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
                </div>

                <!-- Stock -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Stock Quantity</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
                </div>
            </div>

            <!-- Action Button -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-[var(--brand-color)] py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
                    Update Product Information
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
