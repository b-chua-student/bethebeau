@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="flex flex-col gap-8">
    <!-- Header -->
    <div class="flex items-end justify-between">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">User Management</h1>
            <p class="mt-2 text-sm text-gray-500">Manage account permissions, roles, and contact information.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-[var(--brand-color)] px-6 py-3 text-xs font-bold uppercase tracking-widest !text-white !hover:opacity-90 !transition-opacity">
            Add New User
        </a>
    </div>

    <!-- Search Section -->
    <div class="bg-white p-6 border border-gray-100 shadow-sm">
        <x-search-form route='user-management'/>
    </div>

    <!-- Table -->
    <div class="border border-gray-100 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[1100px]">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Full Name</th>
                        <th class="px-6 py-4">Contact & Social</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Verification</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-400">#{{ $user->id }}</td>

                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</p>
                        </td>

                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                            @if($user->instagram_account)
                                <p class="text-[10px] font-medium text-[var(--brand-color)] uppercase tracking-tighter">
                                    {{ $user->instagram_account }}
                                </p>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <p class="max-w-[200px] truncate text-xs text-gray-500" title="{{ $user->address }}">
                                {{ $user->address ?? 'N/A' }}
                            </p>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-widest
                                @if($user->role === 'admin') bg-purple-50 text-purple-600
                                @elseif($user->role === 'guest') bg-gray-100 text-gray-500
                                @else bg-blue-50 text-blue-600 @endif">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-[10px] uppercase tracking-tighter text-gray-400">
                            {{ $user->email_verified_at ? 'Verified: ' . $user->email_verified_at : 'Unverified' }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center gap-4">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-xs font-bold uppercase tracking-widest text-gray-600 hover:text-black">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Permanently delete this user?');">
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
