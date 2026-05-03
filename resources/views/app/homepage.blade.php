@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<!-- Hero Banner -->
<section class="relative h-[calc(100vh-80px)] w-full overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/hero-banner.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <div class="relative z-10 flex h-full flex-col items-center justify-center px-4 text-center">
        <div class="relative z-20 mb-12 w-full max-w-2xl px-4">
            <form action="{{ route('search.product-listing') }}" method="GET" class="relative">
                <input type="text" name="query" placeholder="Search for products..."
                       class="w-full rounded-full border-none bg-white/20 py-4 pl-8 pr-16 text-lg text-white shadow-2xl placeholder:text-gray-300 focus:ring-4 focus:ring-[var(--brand-color)] outline-none">
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full p-3 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>

        <h1 class="font-seasons-italic mb-4 text-5xl font-bold text-white md:text-7xl">Elevate Your Style</h1>
        <p class="mb-8 max-w-lg text-lg text-gray-200">Discover our curated collection of premium products designed for the modern individual.</p>
        <a href="{{ route('app.product-listing') }}" class="rounded-md bg-white px-8 py-3 font-semibold text-[var(--brand-color)] hover:bg-[var(--brand-color)] hover:text-white">Shop Now</a>
    </div>
</section>

<!-- Featured Products Section -->
<section class="bg-white py-20">
    <div class="container mx-auto px-4">
        <div class="mb-12 flex items-end justify-between">
            <div>
                <h2 class="font-seasons-italic text-4xl text-gray-900">Featured Collection</h2>
                <div class="mt-2 h-1 w-20 bg-[var(--brand-color)]"></div>
            </div>
            <a href="{{ route('app.product-listing') }}" class="text-sm font-bold uppercase tracking-widest text-gray-400 hover:text-[var(--brand-color)]">View All</a>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($featuredProducts as $product)
            <div class="group border border-gray-100 p-4">
                <div class="relative mb-4 aspect-square overflow-hidden bg-gray-100">
                    <img src="{{ $product->image_url ?? asset('img/placeholder.jpg') }}" class="h-full w-full object-cover">
                </div>
                <h3 class="text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                <p class="mb-4 text-[var(--brand-color)] font-semibold">₱{{ number_format($product->price, 2) }}</p>
                <a href="{{ route('app.view-product', $product->id) }}" class="block w-full border border-[var(--brand-color)] py-2 text-center text-xs font-bold uppercase text-[var(--brand-color)] hover:bg-[var(--brand-color)] hover:text-white">View Details</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="bg-gray-50 py-20">
    <div class="container mx-auto grid items-center gap-12 px-4 lg:grid-cols-2">
        <div class="aspect-video bg-gray-200 lg:aspect-square">
            <img src="{{ asset('img/about-image.jpg') }}" alt="Our Story" class="h-full w-full object-cover shadow-xl">
        </div>
        <div>
            <span class="text-sm font-bold uppercase tracking-widest text-[var(--brand-color)]">Our Story</span>
            <h2 class="font-seasons-italic my-4 text-4xl text-gray-900">Crafting Excellence Since 2024</h2>
            <p class="mb-6 leading-relaxed text-gray-600">
                We believe that style is a reflection of your inner self. Our mission is to provide high-quality, sustainable, and timeless pieces that empower you to express your unique identity without compromise.
            </p>
            <a href="" class="inline-block border-b-2 border-[var(--brand-color)] pb-1 text-sm font-bold uppercase tracking-tighter text-gray-900 hover:text-[var(--brand-color)]">Learn More</a>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-(--brand-color) pt-16 pb-8 text-white">
    <div class="container mx-auto px-4">
        <div class="mb-12 grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Brand Column -->
            <div>
                <p class="font-seasons-italic mb-6 text-3xl">bethebea</p>
                <p class="text-sm leading-relaxed text-gray-400">Premium quality products curated for excellence. Join our journey toward sustainable luxury.</p>
            </div>
            <!-- Quick Links -->
            <ul class="space-y-4 text-sm">
                <li>
                    <a href="{{ route('app.homepage') }}" class="!text-gray-400 hover:!text-white">Home</a>
                </li>
                <li>
                    <a href="{{ route('app.product-listing') }}" class="!text-gray-400 hover:!text-white">Products</a>
                </li>
                <li>
                    <a href="" class="!text-gray-400 hover:!text-white">About Us</a>
                </li>
                <li>
                    <a href="" class="!text-gray-400 hover:!text-white">FAQ</a>
                </li>
            </ul>

            <!-- Support Links -->
            <ul class="space-y-4 text-sm">
                <li><a href="#" class="!text-gray-400 hover:!text-white">Shipping Policy</a></li>
                <li><a href="#" class="!text-gray-400 hover:!text-white">Returns & Exchanges</a></li>
                <li><a href="#" class="!text-gray-400 hover:!text-white">Privacy Policy</a></li>
                <li><a href="#" class="!text-gray-400 hover:!text-white">Terms of Service</a></li>
            </ul>
            <!-- Newsletter -->
            <div>
                <h4 class="mb-6 text-sm font-bold uppercase tracking-widest text-white">Newsletter</h4>
                <p class="mb-4 text-xs text-gray-400">Subscribe to receive updates and exclusive offers.</p>
                <form class="flex">
                    <input type="email" placeholder="Email Address" class="w-full bg-white/5 border-none p-3 text-sm focus:ring-1 focus:ring-[var(--brand-color)]">
                    <button class="bg-white px-4 text-black hover:bg-gray-200">Join</button>
                </form>
            </div>
        </div>
        <div class="border-t border-white/10 pt-8 text-center text-xs text-gray-500">
            &copy; {{ date('Y') }} bethebea. All rights reserved.
        </div>
    </div>
</footer>
@endsection
