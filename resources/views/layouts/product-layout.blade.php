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
    {{-- <x-store.header /> --}}
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
                    class="relative hidden sm:inline-flex rounded-full p-2 text-slate-700 hover:bg-slate-100 hover:text-sky-600">
                    {{-- Heroicons Shopping Cart --}}
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path
                            d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>


                    <span
                        class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-red-600 px-1 text-xs font-bold text-white">
                        <livewire:cart-count />
                    </span>
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
            <nav class="space-y-1">
                <a href="/" wire:navigate @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>Home</span>
                </a>

                <a href="/categories" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>Categories</span>
                </a>

                <a href="/products" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>All Products</span>
                </a>

                <a href="/offers" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>Special Offers</span>
                </a>

                <a href="/brands" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>Our Brands</span>
                </a>

                <div class="my-3 border-t border-slate-200"></div>

                <a href="{{ Route::has('login') ? route('login') : '#' }}" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>My Account / Login</span>
                </a>

                <a href="#wishlist" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
                    <span>My Wishlist</span>
                    <span class="ml-auto rounded-full bg-orange-100 px-2 py-0.5 text-xs text-orange-600">0</span>
                </a>

                <a href="#cart" @click="mobileMenuOpen = false"
                    class="flex items-center gap-3 rounded-lg px-3 py-3 font-medium text-slate-700 hover:bg-sky-50 hover:text-sky-600">
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


    <main class="min-h-screen bg-slate-50">

    {{-- Breadcrumb --}}
    <div class="mx-3 mt-1 bg-white px-4 py-4 sm:px-6">
        <nav class="flex items-center gap-2 text-sm" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" wire:navigate
               class="font-medium text-blue-700 hover:text-blue-900">
                Home
            </a>
            <svg class="h-4 w-4 text-slate-400" fill="none"
                 stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6"/>
            </svg>
            <span class="font-medium text-slate-900">Products</span>
        </nav>
    </div>

    <section class="mx-auto max-w-[1600px] px-3 py-6 sm:px-6 lg:px-8">

        {{-- Page Title --}}
        <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-sky-600">
                    Discover Your Favorites
                </p>
                <h1 class="mt-2 text-2xl font-extrabold text-slate-900 sm:text-3xl">
                    All Products
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Explore our collection and find the perfect product for you.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <label for="sort" class="shrink-0 text-sm text-slate-500">
                    Sort by:
                </label>
                <select id="sort"
                        class="rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-medium text-slate-700 outline-none focus:border-sky-500">
                    <option value="featured">Featured</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="newest">Newest First</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-4">

            {{-- Filter Sidebar --}}
            <aside id="product-sidebar"
    class="hidden rounded-2xl border border-slate-200 bg-white p-5 lg:sticky lg:top-5 lg:block">

                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h2 class="text-lg font-extrabold text-slate-900">
                        Filters
                    </h2>
                    <button type="reset" form="product-filters"
                            class="text-sm font-semibold text-sky-600 hover:text-sky-800">
                        Clear All
                    </button>
                </div>

                <form id="product-filters" method="GET" action="{{ url('/products') }}">

                    {{-- Search --}}
                    <div class="border-b border-slate-100 py-5">
                        <label for="search"
                               class="mb-3 block text-sm font-bold text-slate-800">
                            Search Products
                        </label>
                        <div class="relative">
                            <svg class="absolute left-3 top-3 h-5 w-5 text-slate-400"
                                 fill="none" stroke="currentColor" stroke-width="1.8"
                                 viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"/>
                                <path stroke-linecap="round" d="m16 16 4 4"/>
                            </svg>
                            <input id="search" name="search" type="search"
                                   value="{{ request('search') }}"
                                   placeholder="Search products..."
                                   class="w-full rounded-xl border border-slate-200 py-2.5 pl-10 pr-3 text-sm outline-none focus:border-sky-500">
                        </div>
                    </div>

                    {{-- Categories --}}
                    <div class="border-b border-slate-100 py-5">
                        <h3 class="mb-4 text-sm font-bold text-slate-800">
                            Categories
                        </h3>

                        @php
                            $categories = [
                                'Electronics',
                                'Fashion',
                                'Home & Living',
                                'Beauty & Personal Care',
                                'Sports & Outdoors',
                                'Accessories',
                            ];
                        @endphp

                        <div class="space-y-3">
                            @foreach($categories as $category)
                                <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600 hover:text-sky-700">
                                    <input type="checkbox" name="categories[]"
                                           value="{{ $category }}"
                                           @checked(in_array($category, (array) request('categories', [])))
                                           class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                    {{ $category }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="border-b border-slate-100 py-5">
                        <h3 class="mb-4 text-sm font-bold text-slate-800">
                            Price Range (NPR)
                        </h3>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label for="min_price" class="mb-1 block text-xs text-slate-500">
                                    Minimum
                                </label>
                                <input id="min_price" name="min_price" type="number"
                                       min="0" value="{{ request('min_price') }}"
                                       placeholder="0"
                                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm outline-none focus:border-sky-500">
                            </div>
                            <div>
                                <label for="max_price" class="mb-1 block text-xs text-slate-500">
                                    Maximum
                                </label>
                                <input id="max_price" name="max_price" type="number"
                                       min="0" value="{{ request('max_price') }}"
                                       placeholder="100000"
                                       class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm outline-none focus:border-sky-500">
                            </div>
                        </div>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <button type="button" data-min="0" data-max="1000"
                                    class="price-preset rounded-lg border border-slate-200 px-3 py-1.5 text-xs text-slate-600 hover:border-sky-500 hover:text-sky-700">
                                Under 1,000
                            </button>
                            <button type="button" data-min="1000" data-max="5000"
                                    class="price-preset rounded-lg border border-slate-200 px-3 py-1.5 text-xs text-slate-600 hover:border-sky-500 hover:text-sky-700">
                                1,000–5,000
                            </button>
                            <button type="button" data-min="5000" data-max="20000"
                                    class="price-preset rounded-lg border border-slate-200 px-3 py-1.5 text-xs text-slate-600 hover:border-sky-500 hover:text-sky-700">
                                5,000–20,000
                            </button>
                        </div>
                    </div>

                    {{-- Brands --}}
                    <div class="border-b border-slate-100 py-5">
                        <h3 class="mb-4 text-sm font-bold text-slate-800">Brands</h3>

                        @php
                            $brands = ['Samsung', 'Apple', 'Sony', 'Xiaomi', 'HP', 'Dell'];
                        @endphp

                        <div class="space-y-3">
                            @foreach($brands as $brand)
                                <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-600 hover:text-sky-700">
                                    <input type="checkbox" name="brands[]"
                                           value="{{ $brand }}"
                                           @checked(in_array($brand, (array) request('brands', [])))
                                           class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                                    {{ $brand }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Rating --}}
                    <div class="py-5">
                        <h3 class="mb-4 text-sm font-bold text-slate-800">
                            Customer Rating
                        </h3>

                        @foreach([4, 3, 2] as $rating)
                            <label class="mb-3 flex cursor-pointer items-center gap-2 text-sm text-slate-600">
                                <input type="radio" name="rating" value="{{ $rating }}"
                                       @checked((string) request('rating') === (string) $rating)
                                       class="h-4 w-4 border-slate-300 text-sky-600 focus:ring-sky-500">

                                <span class="flex items-center gap-1 text-amber-400">
                                    @for($star = 1; $star <= 5; $star++)
                                        <svg class="h-3.5 w-3.5"
                                             fill="{{ $star <= $rating ? 'currentColor' : 'none' }}"
                                             stroke="currentColor" stroke-width="1.5"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.6l6.2-.9L12 3Z"/>
                                        </svg>
                                    @endfor
                                </span>
                                <span>& Up</span>
                            </label>
                        @endforeach
                    </div>

                    <button type="submit"
                            class="w-full rounded-xl bg-sky-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-100">
                        Apply Filters
                    </button>
                </form>
            </aside>

            {{-- Product Results --}}
            @yield('content')
        </div>
    </section>
</main>


    @include('components.home.footer')

     <x-success-message />
    <x-error-message />
    @livewireScripts

    {{-- Small UI helpers --}}

<script>
    // Select price preset buttons
    document.querySelectorAll('.price-preset').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelector('#min_price').value = button.dataset.min;
            document.querySelector('#max_price').value = button.dataset.max;
        });
    });

    // Toggle mobile filters
    document.addEventListener('click', function (event) {
        const button = event.target.closest('#mobile-filter-button');
        const sidebar = document.querySelector('#product-sidebar');

        if (button && sidebar) {
            sidebar.classList.toggle('hidden');

            // Update button text
            button.lastChild.textContent =
                sidebar.classList.contains('hidden')
                    ? ' Filters'
                    : ' Hide Filters';
        }
    });
</script>
</body>

</html>
