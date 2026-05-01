<nav class="flex h-20 w-full items-center justify-between bg-(--brand-color) px-12">
    <!-- Brand -->
    <a href="#" class="shrink-0 flex items-center justify-center">
        <p class="font-seasons-italic text-white text-3xl m-0">bethebeau</p>
    </a>

    <!-- Navigation Links -->
    <div class="flex items-center space-x-6">
        <a href="{{ route('app.homepage') }}" class="group relative py-1 text-white opacity-100 transition-opacity hover:opacity-85">
            Home
            <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
        </a>
        <a href="{{ route('app.product-listing') }}" class="group relative py-1 text-white opacity-100 transition-opacity hover:opacity-85">
            Products
            <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
        </a>
        <a href="" class="group relative py-1 text-white opacity-100 transition-opacity hover:opacity-85">
            About Us
            <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
        </a>
        <a href="" class="group relative py-1 text-white opacity-100 transition-opacity hover:opacity-85">
            FAQ
            <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
        </a>
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-10">
        <a href="{{ route('app.shopping-cart') }}" class="block">
            <img src="{{ asset('img/cart-white.svg') }}" alt="Cart" class="h-7 w-7 transition-transform duration-200 hover:scale-115">
        </a>
        <form method="POST" action="{{ route('auth.logout') }}" class="m-0">
            @csrf
            <button type="submit" class="group relative p-0 text-white opacity-100 outline-none transition-opacity hover:opacity-85 focus:ring-0">
                Logout
                <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
            </button>
        </form>
    </div>
</nav>
