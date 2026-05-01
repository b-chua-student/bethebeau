@extends('layouts.admin')

@section('title', 'Category Management')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Header -->
    <div class="flex items-end justify-between">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">Category Management</h1>
            <p class="mt-2 text-sm text-gray-500">Organize and classify your product inventory.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-[var(--brand-color)] px-6 py-3 text-xs font-bold uppercase tracking-widest !text-white !hover:opacity-90 !transition-opacity">
            Add New Category
        </a>
    </div>

    <!-- Search Section -->
    <div class="bg-white p-6 border border-gray-100 shadow-sm">
        <x-search-form route='category-management'/>
    </div>

    <!-- Table -->
    <div class="border border-gray-100 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-6 py-4 w-20">ID</th>
                        <th class="px-6 py-4">Category Name</th>
                        <th class="px-6 py-4 text-gray-300 italic font-medium lowercase tracking-normal">slug-identifier</th>
                        <th class="px-6 py-4">Created</th>
                        <th class="px-6 py-4">Updated</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($categories as $category)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-400">#{{ $category->id }}</td>

                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">{{ $category->name }}</p>
                        </td>

                        <td class="px-6 py-4">
                            <code class="text-[11px] font-mono bg-gray-50 px-2 py-1 text-gray-500 rounded">
                                {{ $category->slug }}
                            </code>
                        </td>

                        <td class="px-6 py-4 text-[10px] uppercase tracking-tighter text-gray-400">
                            {{ $category->created_at->format('M d, Y') }}
                        </td>

                        <td class="px-6 py-4 text-[10px] uppercase tracking-tighter text-gray-400">
                            {{ $category->updated_at->format('M d, Y') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-4">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-xs font-bold uppercase tracking-widest text-gray-600 hover:text-black">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Deleting this category may affect linked products. Continue?');">
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
