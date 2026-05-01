@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container mx-auto max-w-4xl px-4 py-12">
    <div class="mb-10 flex items-end justify-between border-b border-gray-100 pb-6">
        <div>
            <h1 class="font-seasons-italic text-4xl text-gray-900">My Profile</h1>
            <p class="mt-2 text-sm text-gray-500">Manage your account settings and order history.</p>
        </div>
        <a href="{{ route('app.profile.orders') }}" class="text-xs font-bold uppercase tracking-widest text-[var(--brand-color)] hover:underline">
            View My Orders
        </a>
    </div>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <!-- Profile Info Card -->
        <div class="lg:col-span-2">
            <div class="border border-gray-100 bg-white p-8 shadow-sm">
                <div class="grid grid-cols-1 gap-y-8 sm:grid-cols-2">
                    <div>
                        <h3 class="mb-1 text-[10px] font-bold uppercase tracking-widest text-gray-400">Full Name</h3>
                        <p class="text-lg font-medium text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</p>
                    </div>
                    <div>
                        <h3 class="mb-1 text-[10px] font-bold uppercase tracking-widest text-gray-400">Email Address</h3>
                        <p class="text-lg font-medium text-gray-900">{{ $user->email }}</p>
                    </div>
                    <div>
                        <h3 class="mb-1 text-[10px] font-bold uppercase tracking-widest text-gray-400">Instagram</h3>
                        <p class="text-lg font-medium {{ $user->instagram_account ? 'text-gray-900' : 'text-gray-300' }}">
                            {{ $user->instagram_account ?? 'Not linked' }}
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-1 text-[10px] font-bold uppercase tracking-widest text-gray-400">Shipping Address</h3>
                        <p class="text-sm leading-relaxed text-gray-600">
                            {{ $user->address ?? 'No address saved.' }}
                        </p>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-50">
                    <a href="{{ route('app.profile.edit') }}" class="inline-block bg-[var(--brand-color)] px-8 py-3 text-sm font-bold uppercase tracking-widest text-white hover:opacity-90">
                        Edit Profile Details
                    </a>
                </div>
            </div>
        </div>

        <!-- Account Actions Card -->
        <div class="lg:col-span-1">
            <div class="border border-gray-100 bg-gray-50 p-8 shadow-sm">
                <h3 class="mb-6 text-xs font-bold uppercase tracking-widest text-gray-900">Account Security</h3>

                <div class="space-y-4">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="w-full border border-gray-300 bg-white py-3 text-sm font-bold uppercase tracking-widest text-gray-700 hover:bg-gray-50">
                            Logout
                        </button>
                    </form>

                    <div class="pt-8 mt-8 border-t border-gray-200">
                        <p class="mb-4 text-[10px] leading-tight text-gray-400 uppercase tracking-wider">
                            Danger Zone: This action is permanent and cannot be undone.
                        </p>
                        <form method="POST" action="{{ route('app.profile.delete') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-xs font-bold uppercase tracking-widest text-red-500 hover:text-red-700 transition-colors">
                                Delete My Account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
