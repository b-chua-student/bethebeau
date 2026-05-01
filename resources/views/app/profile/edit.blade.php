@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto max-w-2xl px-4 py-12">
    <div class="mb-10">
        <a href="{{ route('app.profile.index') }}" class="text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)]">
            &larr; Back to Profile
        </a>
        <h1 class="font-seasons-italic mt-4 text-4xl text-gray-900">Edit Profile</h1>
    </div>

    <div class="border border-gray-100 bg-white p-8 shadow-sm">
        <form method="POST" action="{{ route('app.profile.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- First Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
                </div>

                <!-- Last Name -->
                <div>
                    <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                           class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
            </div>

            <!-- Instagram -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Instagram Account</label>
                <input type="text" name="instagram_account" value="{{ old('instagram_account', $user->instagram_account) }}"
                       placeholder="@username"
                       class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">
            </div>

            <!-- Address -->
            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-widest text-gray-400">Default Shipping Address</label>
                <textarea name="address" rows="3"
                          class="w-full border border-gray-200 bg-white px-4 py-3 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none">{{ old('address', $user->address) }}</textarea>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 p-4 border-l-4 border-red-500">
                    <ul class="list-inside list-disc text-xs font-medium text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full bg-[var(--brand-color)] py-4 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
