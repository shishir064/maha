<div>
   
<nav class="hidden border-t border-slate-200 bg-white md:block">
    <div class="mx-auto flex w-full items-center justify-between gap-5 px-4 text-sm font-medium sm:px-10">

        {{-- Home --}}
        <a href="/"
           wire:navigate
           class="shrink-0 py-3 transition hover:text-sky-600">
            Home
        </a>

        {{-- Categories Dropdown --}}
        <div
            class="relative shrink-0"
            x-data="{ open: false }"
            @mouseenter="open = true"
            @mouseleave="open = false"
        >
            {{-- Dropdown Button --}}
            <button
                type="button"
                @click="open = !open"
                @keydown.escape="open = false"
                :aria-expanded="open"
                class="flex items-center gap-1 py-3 transition hover:text-sky-600"
            >
                Categories

                <svg
                    class="h-4 w-4 transition-transform duration-200"
                    :class="{ 'rotate-180': open }"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                    />
                </svg>
            </button>

            {{-- Dropdown Menu --}}
            <div
                x-cloak
                x-show="open"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 translate-y-1"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-1"
                @click.outside="open = false"
                class="absolute left-0 top-full z-50 mt-1 w-64 overflow-hidden rounded-lg border border-slate-200 bg-white shadow-xl"
            >
                {{-- Dropdown Heading --}}
                <div class="border-b border-slate-100 px-4 py-3">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Shop by Category
                    </p>
                </div>

                {{-- Category List --}}
                <div class="max-h-80 overflow-y-auto py-1">
                    @forelse ($categories as $category)
                        <a
                            href="{{ url('/categories/' . $category->slug) }}"
                            wire:navigate
                            wire:key="nav-category-{{ $category->id }}"
                            class="block break-words px-4 py-2.5 text-sm font-normal text-slate-700 transition hover:bg-sky-50 hover:text-sky-600"
                        >
                            {{ $category->name }}
                        </a>
                    @empty
                        <p class="px-4 py-3 text-sm font-normal text-slate-500">
                            No categories available.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- New Arrivals --}}
        <a href="#"
           class="shrink-0 py-3 transition hover:text-sky-600">
            New Arrivals
        </a>

        {{-- Laptops --}}
        <a href="#"
           class="shrink-0 py-3 transition hover:text-sky-600">
            Laptops
        </a>

        {{-- Mobiles --}}
        <a href="#"
           class="shrink-0 py-3 transition hover:text-sky-600">
            Mobiles
        </a>

        {{-- Contact --}}
        <a href="{{ route('contact') }}"
           class="shrink-0 py-3 transition hover:text-sky-600">
            Contact Us
        </a>

        {{-- Blogs --}}
        <a href="#"
           class="shrink-0 py-3 transition hover:text-sky-600">
            Blogs
        </a>

        {{-- Flash Sale --}}
        <a href="#"
           class="shrink-0 rounded-md bg-orange-500 px-4 py-1.5 text-white transition hover:bg-orange-600">
            Flash Sale
        </a>

    </div>
</nav>

</div>
