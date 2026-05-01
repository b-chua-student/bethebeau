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
        <!-- Profile Link -->
        <a href="{{ route('app.profile.index') }}" class="block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white transition-transform duration-200 hover:scale-115" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </a>

        <!-- Cart -->
        <a href="{{ route('app.shopping-cart') }}" class="group block">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-7 w-7 text-white transition-transform duration-200 group-hover:scale-115">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('auth.logout') }}" class="m-0">
            @csrf
            <button type="submit" class="group relative p-0 text-white opacity-100 outline-none transition-opacity hover:opacity-85 focus:ring-0">
                Logout
                <span class="absolute bottom-0 left-1/2 h-[2px] w-0 -translate-x-1/2 bg-white transition-all duration-200 group-hover:w-3/5"></span>
            </button>
        </form>
    </div>
</nav>
