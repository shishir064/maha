
<nav class="relative z-40 hidden border-y border-cyan-400 bg-[#06B6D4] md:block">
    <div class="flex w-full items-center justify-between px-4 sm:px-10">

        {{-- Left Side: Navigation Links --}}
        <div class="flex items-center gap-5 text-sm font-semibold text-white">

            {{-- Home --}}
            <a href="/"
               wire:navigate
               class="shrink-0 py-3 transition-colors duration-200 hover:text-cyan-100">
                Home
            </a>

            {{-- Categories Dropdown --}}
            <div class="relative shrink-0"
                 x-data="{ open: false }"
                 @mouseenter="open = true"
                 @mouseleave="open = false">

                <button type="button"
                        @click="open = !open"
                        @keydown.escape="open = false"
                        :aria-expanded="open"
                        class="flex items-center gap-1 py-3 transition-colors duration-200 hover:text-cyan-100">
                    Categories

                    <svg class="h-3.5 w-3.5 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>

                {{-- Categories Dropdown --}}
                <div x-cloak
                     x-show="open"
                     x-transition
                     @click.outside="open = false"
                     class="absolute left-0 top-full z-50 w-60 overflow-hidden rounded-b-lg border border-cyan-100 bg-white text-slate-700 shadow-lg">

                    <div class="border-b border-slate-100 bg-cyan-50 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-cyan-700">
                            Shop by Category
                        </p>
                    </div>

                    <div class="max-h-80 overflow-y-auto py-1">
                        @forelse ($categories as $category)
                            <a href="{{ url('/categories/' . $category->slug) }}"
                               wire:navigate
                               wire:key="nav-category-{{ $category->id }}"
                               class="block break-words px-4 py-2 text-sm font-medium transition hover:bg-cyan-50 hover:text-cyan-700">
                                {{ $category->name }}
                            </a>
                        @empty
                            <p class="px-4 py-3 text-sm text-slate-500">
                                No categories available.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- All Products --}}
            <a href="#"
               class="shrink-0 py-3 transition-colors duration-200 hover:text-cyan-100">
                All Products
            </a>

            {{-- About Us --}}
            <a href="#"
               class="shrink-0 py-3 transition-colors duration-200 hover:text-cyan-100">
                About Us
            </a>

            {{-- Brands Dropdown --}}
            <div class="relative shrink-0"
                 x-data="{ open: false }"
                 @mouseenter="open = true"
                 @mouseleave="open = false">

                <button type="button"
                        @click="open = !open"
                        @keydown.escape="open = false"
                        :aria-expanded="open"
                        class="flex items-center gap-1 py-3 transition-colors duration-200 hover:text-cyan-100">
                    Brands

                    <svg class="h-3.5 w-3.5 transition-transform duration-200"
                         :class="{ 'rotate-180': open }"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.8"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>

                {{-- Brands Dropdown --}}
                <div x-cloak
                     x-show="open"
                     x-transition
                     @click.outside="open = false"
                     class="absolute left-0 top-full z-50 w-60 overflow-hidden rounded-b-lg border border-cyan-100 bg-white text-slate-700 shadow-lg">

                    <div class="border-b border-slate-100 bg-cyan-50 px-4 py-3">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-cyan-700">
                            Shop by Brand
                        </p>
                    </div>

                    <div class="max-h-80 overflow-y-auto py-1">
                        @forelse ($brands as $brand)
                            <a href="{{ url('/brands/' . $brand->slug) }}"
                               wire:navigate
                               wire:key="nav-brand-{{ $brand->id }}"
                               class="block break-words px-4 py-2 text-sm font-medium transition hover:bg-cyan-50 hover:text-cyan-700">
                                {{ $brand->name }}
                            </a>
                        @empty
                            <p class="px-4 py-3 text-sm text-slate-500">
                                No brands available.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Blogs --}}
            <a href="#"
               class="shrink-0 py-3 transition-colors duration-200 hover:text-cyan-100">
                Blogs
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               class="shrink-0 py-3 transition-colors duration-200 hover:text-cyan-100">
                Contact Us
            </a>

        </div>

        {{-- Right Side: Shop Now --}}
        <a href="#"
           class="ml-4 shrink-0 rounded-md bg-white px-4 py-1.5 text-xs font-bold text-cyan-700 transition hover:bg-cyan-50">
            Shop Now
        </a>

    </div>
</nav>
