<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mahasasto Shop' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('logo/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-slate-100 text-slate-800 antialiased w-full ">
    
    <x-home.top-bar />



    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="mx-auto flex items-center gap-3 px-4 py-3 sm:px-10">

            <!-- Mobile Menu Button -->
            <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" :aria-expanded="mobileMenuOpen.toString()"
                aria-label="Toggle navigation menu" class="rounded-lg p-2 text-sky-600 hover:bg-slate-100 md:hidden">
                <!-- Hamburger Icon -->
                <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5m-16.5 5.25h16.5m-16.5 5.25h16.5" />
                </svg>

                <!-- Close Icon -->
                <svg x-cloak x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>

            <!-- Logo -->
            <a href="/" wire:navigate class="flex shrink-0 items-center">
                <img src="{{ asset('logo/logo.png') }}" alt="Mahasasto Shop"
                    class="h-12 w-auto max-w-[150px] object-contain sm:h-14 sm:max-w-[190px]">
            </a>

            <!-- Desktop Search -->
            <form action="#" method="GET" class="mx-auto hidden w-full max-w-xl md:block">
                <div
                    class="flex items-center rounded-full border border-slate-200 bg-slate-50 px-4 py-2 transition focus-within:border-sky-500">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 shrink-0 text-slate-400">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m16 16 4 4" />
                    </svg>

                    <input type="search" name="search" placeholder="Search products..."
                        class="w-full border-0 bg-transparent px-3 text-sm outline-none focus:ring-0">
                </div>
            </form>

            <!-- Account, Wishlist and Cart -->
            <div class="ml-auto flex shrink-0 items-center gap-1 sm:gap-3">

                <!-- Account -->
                <a href="{{ Route::has('login') ? route('login') : '#' }}" aria-label="My account"
                    class="rounded-full p-2 text-slate-700 hover:bg-slate-100 hover:text-sky-600">
                    <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0A17.9 17.9 0 0 1 12 21.75c-2.7 0-5.25-.6-7.5-1.65Z" />
                    </svg>
                </a>

                <!-- Wishlist -->
                <a href="#wishlist" aria-label="Wishlist"
                    class="relative rounded-full p-2 text-slate-700 hover:bg-slate-100 hover:text-red-500">
                    <svg fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0 4.97-9 10.5-9 10.5S3 13.22 3 8.25a4.5 4.5 0 0 1 8.1-2.7L12 6.6l.9-1.05A4.5 4.5 0 0 1 21 8.25Z" />
                    </svg>
                    <span
                        class="absolute -right-0.5 -top-0.5 flex h-4 min-w-4 items-center justify-center rounded-full bg-orange-500 px-1 text-[9px] font-bold text-white">0</span>
                </a>

                <!-- Cart -->
                <a href="{{ route('cart') }}" wire:navigate aria-label="Shopping cart"
                    class="relative rounded-full p-2 text-slate-700 hover:bg-slate-100 hover:text-sky-600">
                    {{-- Heroicons Shopping Cart --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>


                    <span
                        class="absolute -right-0.5 -top-0.5 flex h-4 min-w-4 items-center justify-center rounded-full bg-orange-500 px-1 text-[9px] font-bold text-white">0</span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-cloak x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2" @click.outside="mobileMenuOpen = false"
            @keydown.escape.window="mobileMenuOpen = false"
            class="border-t border-slate-200 bg-white px-4 pb-5 pt-4 shadow-lg md:hidden">
            <!-- Mobile Search -->
            <form action="#" method="GET" class="mb-4">
                <div
                    class="flex items-center rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 focus-within:border-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="h-5 w-5 text-slate-400">
                        <circle cx="11" cy="11" r="7" />
                        <path stroke-linecap="round" d="m16 16 4 4" />
                    </svg>

                    <input type="search" name="search" placeholder="Search products..."
                        class="w-full border-0 bg-transparent px-3 text-sm outline-none focus:ring-0">
                </div>
            </form>

            <!-- Navigation Links -->
            
{{-- Mobile Navigation Links --}}
<nav class="space-y-1">

    {{-- Home --}}
    <a href="/"
       wire:navigate
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor"
             stroke-width="1.7" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m2.25 12 9.204-8.436a.75.75 0 0 1 1.092 0L21.75 12M4.5 9.938V19.5a.75.75 0 0 0 .75.75h4.5v-6h4.5v6h4.5a.75.75 0 0 0 .75-.75V9.938" />
        </svg>
        <span>Home</span>
    </a>

    {{-- All Products --}}
    <a href="/products"
       wire:navigate
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor"
             stroke-width="1.7" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3.75 6.75h16.5v12.5H3.75zM3.75 10.5h16.5M8 6.75v12.5" />
        </svg>
        <span>All Products</span>
    </a>

    {{-- Categories Dropdown --}}
    <div x-data="{ categoriesOpen: false }" class="rounded-lg">

        <button type="button"
                @click="categoriesOpen = !categoriesOpen"
                :aria-expanded="categoriesOpen"
                class="flex w-full items-center justify-between rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">

            <span class="flex items-center gap-3">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor"
                     stroke-width="1.7" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Categories
            </span>

            <svg class="h-4 w-4 shrink-0 transition-transform duration-200"
                 :class="{ 'rotate-180': categoriesOpen }"
                 fill="none" stroke="currentColor" stroke-width="1.8"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </button>

        {{-- Expandable Category List --}}
        <div x-cloak
             x-show="categoriesOpen"
             x-transition
             class="ml-5 mt-1 overflow-hidden rounded-lg border-l-2 border-sky-100 pl-3">

            <div class="max-h-56 space-y-1 overflow-y-auto py-1">

                @forelse (\App\Models\Category::orderBy('name')->get() as $category)
                    <a href="{{ url('/categories/' . $category->slug) }}"
                       wire:navigate
                       @click="mobileMenuOpen = false"
                       class="block break-words rounded-md px-3 py-2.5 text-sm font-normal text-slate-600 transition hover:bg-sky-50 hover:text-sky-600">
                        {{ $category->name }}
                    </a>
                @empty
                    <p class="px-3 py-3 text-sm text-slate-500">
                        No categories available.
                    </p>
                @endforelse

            </div>
        </div>
    </div>

    {{-- Special Offers --}}
    <a href="/offers"
       wire:navigate
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor"
             stroke-width="1.7" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m12 3 2.5 5.5 6 .7-4.5 4.1 1.2 6-5.2-3-5.2 3 1.2-6-4.5-4.1 6-.7L12 3Z" />
        </svg>
        <span>Special Offers</span>
    </a>

    {{-- Our Brands --}}
    <a href="/brands"
       wire:navigate
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor"
             stroke-width="1.7" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3 3.75 7.5 12 12l8.25-4.5L12 3ZM3.75 12 12 16.5 20.25 12M3.75 16.5 12 21l8.25-4.5" />
        </svg>
        <span>Our Brands</span>
    </a>

    {{-- Divider --}}
    <div class="my-3 border-t border-slate-200"></div>

    {{-- Account --}}
    <a href="{{ Route::has('login') ? route('login') : '#' }}"
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <span>My Account / Login</span>
    </a>

    {{-- Wishlist --}}
    <a href="#wishlist"
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <span>My Wishlist</span>
        <span class="ml-auto rounded-full bg-orange-100 px-2 py-0.5 text-xs text-orange-600">0</span>
    </a>

    {{-- Cart --}}
    <a href="{{ route('cart') }}"
       wire:navigate
       @click="mobileMenuOpen = false"
       class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 transition hover:bg-sky-50 hover:text-sky-600">
        <span>My Cart</span>
        <span class="ml-auto rounded-full bg-orange-100 px-2 py-0.5 text-xs text-orange-600">0</span>
    </a>

</nav>

        </div>

        <!-- Existing Desktop Navigation -->
        <div class="hidden md:block">
            <x-home.nav />
        </div>
    </header>


    <main class="w-full">

        @yield('content')

    </main>
    @include('components.home.footer')

   <x-success-message />
    <x-error-message />
    @livewireScripts
</body>

</html>
