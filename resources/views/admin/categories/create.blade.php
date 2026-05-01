@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="container mx-auto max-w-2xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.categories.create') }}" class="bg-[var(--brand-color)] px-6 py-3 text-xs font-bold uppercase tracking-widest !text-white !hover:opacity-90 !transition-opacity">
            &larr; Back to Category Management
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Create Category</h1>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Category Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Living Room"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
            </div>

            <!-- Slug (Hidden or Read-only) -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">URL Identifier (Slug)</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}" readonly
                       class="w-full border border-gray-100 bg-gray-50 px-4 py-3 text-sm font-mono text-gray-400 outline-none cursor-not-allowed">
                <p class="mt-2 text-[10px] text-gray-400 italic font-medium">Generated automatically based on the name.</p>
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
                    Save New Category
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    nameInput.addEventListener('input', function() {
        slugInput.value = this.value
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    });
</script>
@endsection
