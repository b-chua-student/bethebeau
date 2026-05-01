<aside class="flex h-screen w-64 flex-col bg-(--brand-color) text-white shadow-2xl">
    <!-- Admin Brand Header -->
    <div class="flex h-20 items-center justify-center border-b border-white/10 px-8">
        <p class="font-seasons-italic text-2xl text-white">Admin Panel</p>
    </div>

    <!-- Navigation Links -->
    <nav class="flex flex-1 flex-col py-6">
        <div class="px-4 mb-4">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-white/50 px-4">Menu</p>
        </div>

        <div class="flex flex-col space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-8 py-4 text-xs font-bold uppercase tracking-widest transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white !text-[var(--brand-color)]' : '!text-white/90 hover:bg-white/10' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="flex items-center px-8 py-4 text-xs font-bold uppercase tracking-widest transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-white !text-[var(--brand-color)]' : '!text-white/90 hover:bg-white/10' }}">
                Product Management
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center px-8 py-4 text-xs font-bold uppercase tracking-widest transition-colors {{ request()->routeIs('admin.orders.*') ? 'bg-white !text-[var(--brand-color)]' : '!text-white/90 hover:bg-white/10' }}">
                Order Management
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="flex items-center px-8 py-4 text-xs font-bold uppercase tracking-widest transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-white !text-[var(--brand-color)]' : '!text-white/90 hover:bg-white/10' }}">
                User Management
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center px-8 py-4 text-xs font-bold uppercase tracking-widest transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-white !text-[var(--brand-color)]' : '!text-white/90 hover:bg-white/10' }}">
                Category Management
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="border-t border-white/10 p-6">
        <a href="{{ route('app.homepage') }}" class="text-[10px] font-bold uppercase tracking-widest !text-white/70 !hover:text-white">
            &larr; Exit to Store
        </a>
    </div>
</aside>
