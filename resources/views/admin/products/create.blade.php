@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="container mx-auto max-w-3xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.products.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to Product Management
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Create New Product</h1>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.products.store') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Category -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Category</label>
                    <select name="category_id" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Active Status -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Visibility</label>
                    <select name="is_active" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active (Visible in Store)</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive (Hidden)</option>
                    </select>
                </div>
            </div>

            <!-- Name -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Product Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Silk Evening Gown"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
            </div>

            <!-- Description -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Detailed Description</label>
                <textarea name="description" rows="5" placeholder="Describe materials, sizing, and care instructions..."
                          class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Price -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Price (₱)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" placeholder="0.00"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
                </div>

                <!-- Stock -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Stock Quantity</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" placeholder="0"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required/>
                </div>
            </div>

            <!-- Action Button -->
            <div class="pt-6">
                <button type="submit" class="w-full bg-[var(--brand-color)] py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
                    Create Product Entry
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
