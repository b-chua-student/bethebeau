@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="container mx-auto max-w-2xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to Category Management
        </a>
        <div class="mt-4 flex items-center justify-between">
            <h1 class="font-seasons-italic text-4xl text-gray-900">Edit Category</h1>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">ID: #{{ $category->id }}</span>
        </div>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
            </div>

            <!-- Slug -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}"
                       class="w-full border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-mono text-gray-500 focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                <p class="mt-2 text-[10px] text-gray-400 italic font-medium">Used for the public URL identifier.</p>
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

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-[var(--brand-color)] py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
                    Update Category Details
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Optional: Auto-slugify name if changed
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('input', function() {
        if (slugInput.dataset.manual !== "true") {
            slugInput.value = this.value
                .toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
        }
    });

    slugInput.addEventListener('input', function() {
        this.dataset.manual = "true";
    });
</script>
@endsection
