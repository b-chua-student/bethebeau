@extends('layout@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div class="container mx-auto max-w-3xl">
    <!-- Header -->
    <div class="mb-10">
        <a href="{{ route('admin.users.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)] transition-colors">
            &larr; Back to User Management
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Create New User</h1>
    </div>

    <!-- Form Card -->
    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- First Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="John"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>

                <!-- Last Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Doe"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
            </div>

            <!-- Email & Role -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="md:col-span-2">
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">System Role</label>
                    <select name="role" class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none appearance-none">
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="guest" {{ old('role') == 'guest' ? 'selected' : '' }}>Guest</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <hr class="border-gray-50 my-8">

            <!-- Password Fields -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Password</label>
                    <input type="password" name="password"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none" required>
                </div>
            </div>

            <!-- Profile Details -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Instagram Handle</label>
                <input type="text" name="instagram_account" value="{{ old('instagram_account') }}" placeholder="@username"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Mailing Address</label>
                <textarea name="address" rows="2" placeholder="Full street address..."
                          class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('address') }}</textarea>
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
                    Register User Account
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
