@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="container mx-auto max-w-3xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.users.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to User Management
        </a>
        <div class="mt-4 flex items-center justify-between">
            <h1 class="font-seasons-italic text-4xl text-gray-900">Edit User</h1>
            <span class="text-[10px] font-bold uppercase tracking-widest text-gray-400">User ID: #{{ $user->id }}</span>
        </div>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- First Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>

                <!-- Last Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
            </div>

            <!-- Email & Role -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">System Role</label>
                    <select name="role" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                        <option value="guest" {{ old('role', $user->role) === 'guest' ? 'selected' : '' }}>Guest</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <hr class="border-gray-50 my-8">

            <!-- Security Section -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Update Password</label>
                <input type="password" name="password" placeholder="Leave blank to keep current password"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
                <p class="mt-2 text-[10px] text-gray-400 italic font-medium">Only fill this if you want to reset the user's password.</p>
            </div>

            <!-- Profile Details -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Instagram Handle</label>
                <input type="text" name="instagram_account" value="{{ old('instagram_account', $user->instagram_account) }}"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Mailing Address</label>
                <textarea name="address" rows="2"
                          class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('address', $user->address) }}</textarea>
            </div>

            <!-- Action Button -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-[var(--brand-color)] py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90 transition-opacity">
                    Update User Account
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
