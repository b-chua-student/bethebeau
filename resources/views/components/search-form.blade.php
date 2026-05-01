<form action="{{ route('search.' . $route) }}" method="GET" class="relative flex w-full items-center">
    <!-- Search Icon -->
    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>

    <!-- Input Field -->
    <input
        type="text"
        name="query"
        placeholder="Search..."
        value="{{ request('query') }}"
        class="w-full border border-gray-200 bg-white py-3 pl-11 pr-28 text-sm focus:border-[var(--brand-color)] focus:ring-1 focus:ring-[var(--brand-color)] outline-none"
    />

    <!-- Action Button -->
    <button
        type="submit"
        class="absolute right-1 top-1 bottom-1 bg-[var(--brand-color)] px-5 text-xs font-bold uppercase tracking-wider text-white hover:opacity-90"
    >
        Search
    </button>
</form>
