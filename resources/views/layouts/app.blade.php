
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>{{ $title ?? 'Admin Dashboard' }} | Mahasasto Shop</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 font-sans antialiased text-slate-800">

<div x-data="{ sidebarOpen: false }" class="min-h-screen">

    {{-- Mobile Sidebar Overlay --}}
    <div
        x-cloak
        x-show="sidebarOpen"
        x-transition.opacity
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-950/50 lg:hidden">
    </div>

    {{-- Sidebar --}}
    
<aside
    class="fixed inset-y-0 left-0 z-50 flex w-72 flex-col border-r border-slate-200 bg-slate-50 text-slate-800 transition-transform duration-300 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    {{-- Logo --}}
    <div class="flex h-20 items-center justify-between border-b border-slate-200 px-6">
        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-200">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor"
                     class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 3h2l2.4 12.2a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 7H6"/>
                    <circle cx="10" cy="21" r="1"/>
                    <circle cx="18" cy="21" r="1"/>
                </svg>
            </div>

            <div>
                <h1 class="text-xl font-extrabold tracking-tight text-slate-900">
                    Mahasasto
                </h1>
                <p class="text-xs font-medium text-slate-500">SHOP ADMIN PANEL</p>
            </div>
        </a>

        <button
            @click="sidebarOpen = false"
            class="rounded-lg p-2 text-slate-500 transition hover:bg-white hover:text-indigo-600 lg:hidden"
            aria-label="Close sidebar">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Sidebar Navigation --}}
    <nav class="sidebar-scroll flex-1 space-y-1 overflow-y-auto px-4 py-5">

        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Main Menu
        </p>

        {{-- Dashboard --}}
        <a href="{{ url('/dashboard') }}"
           class="flex items-center gap-3 rounded-xl bg-indigo-600 px-4 py-3 font-medium text-white shadow-lg shadow-indigo-200/60 transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 13h8V3H3v10Zm0 8h8v-5H3v5Zm12 0h6V11h-6v10Zm0-18v4h6V3h-6Z"/>
            </svg>
            Dashboard
        </a>

        {{-- Orders Dropdown --}}
        <div x-data="{ open: false }">
            <button
                @click="open = !open"
                :aria-expanded="open"
                class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
                <span class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01"/>
                    </svg>
                    Orders
                </span>

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor"
                     class="h-4 w-4 transition-transform"
                     :class="{ 'rotate-180': open }">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                </svg>
            </button>

            <div x-cloak x-show="open" x-transition
                 class="ml-7 mt-1 space-y-1 border-l border-slate-200 pl-4">
                <a href="{{ url('/admin/orders') }}"
                   class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition hover:bg-white hover:text-indigo-600">
                    All Orders
                </a>
                <a href="{{ url('/admin/orders?status=pending') }}"
                   class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition hover:bg-white hover:text-indigo-600">
                    Pending Orders
                </a>
                <a href="{{ url('/admin/orders?status=processing') }}"
                   class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition hover:bg-white hover:text-indigo-600">
                    Processing
                </a>
                <a href="{{ url('/admin/orders?status=shipped') }}"
                   class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition hover:bg-white hover:text-indigo-600">
                    Shipped
                </a>
                <a href="{{ url('/admin/orders?status=delivered') }}"
                   class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition hover:bg-white hover:text-indigo-600">
                    Delivered
                </a>
            </div>
        </div>

        {{-- Products Dropdown --}}
        <div x-data="{ open: false }">
            <button
                @click="open = !open"
                :aria-expanded="open"
                class="flex w-full items-center justify-between rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
                <span class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 7.5-9-5-9 5m18 0-9 5m9-5v9l-9 5m0-9-9-5m9 5v9m-9-14v9l9 5"/>
                    </svg>
                    Products
                </span>

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="1.8" stroke="currentColor"
                     class="h-4 w-4 transition-transform"
                     :class="{ 'rotate-180': open }">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                </svg>
            </button>

            <div x-cloak x-show="open" x-transition
                 class="ml-7 mt-1 space-y-1 border-l border-slate-200 pl-4">
                <a href="{{ route('admin.products.index') }}"
                 wire:navigate  class="block rounded-lg px-3 py-2 text-sm text-slate-500 transition  hover:bg-white hover:text-indigo-600">
                    All Products
                </a>
                <a href="{{ route('admin.products.create') }}"
                   class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm text-slate-500 transition  hover:bg-white hover:text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                    Add Product
                </a>
            </div>
        </div>

        {{-- Categories --}}
        <a href="{{ route('admin.category.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4.5 5.25h6v6h-6v-6Zm9 0h6v6h-6v-6Zm-9 9h6v6h-6v-6Zm9 0h6v6h-6v-6Z"/>
            </svg>
            Categories
        </a>

        {{-- Brands --}}
        <a href="{{ route('admin.brand.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m12 3 2.7 5.47 6.03.88-4.36 4.25 1.03 6.01L12 16.77l-5.4 2.84 1.03-6.01-4.36-4.25 6.03-.88L12 3Z"/>
            </svg>
            Brands
        </a>

        {{-- Customers --}}
        <a href="{{ url('/admin/customers') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16 18.5a4.5 4.5 0 0 0-9 0m13 0a4 4 0 0 0-3.2-3.92M4 18.5a4 4 0 0 1 3.2-3.92M15.5 7.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm4 2a3 3 0 1 1-2-2.83"/>
            </svg>
            Customers
        </a>

        {{-- Store Management --}}
        <p class="mb-3 mt-7 px-3 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Store Management
        </p>

        {{-- Coupons --}}
        <a href="{{ url('/admin/coupons') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 7.5h6m-6 4h6m-6 4h3M5.25 3.75h13.5A2.25 2.25 0 0 1 21 6v12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18V6a2.25 2.25 0 0 1 2.25-2.25Z"/>
            </svg>
            Coupons
        </a>

        {{-- Banners --}}
        <a href="{{ route('admin.advertisement.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 5.25h18v13.5H3V5.25Zm0 9 5-5 4 4 3-3 6 6"/>
            </svg>
          advertisement Banners
        </a>


        
        {{-- audiance types --}}
        <a href="{{route('admin.types.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 5.25h18v13.5H3V5.25Zm0 9 5-5 4 4 3-3 6 6"/>
            </svg>
            Audience Types
        </a>

        
        {{-- sliders --}}
        <a href="{{route('admin.sliders.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 5.25h18v13.5H3V5.25Zm0 9 5-5 4 4 3-3 6 6"/>
            </svg>
         slider
        </a>


        {{-- Blogs --}}
        <a href="{{ url('/admin/blogs') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 7.5h7.5M12 12h7.5M12 16.5h7.5M4.5 7.5h.01M4.5 12h.01M4.5 16.5h.01M4.5 3.75h15A1.5 1.5 0 0 1 21 5.25v13.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18.75V5.25a1.5 1.5 0 0 1 1.5-1.5Z"/>
            </svg>
            Blogs
        </a>

        {{-- Messages --}}
        <a href="{{ url('/admin/messages') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-9.75 6.75L2.25 6.75"/>
            </svg>
            Messages
        </a>

        {{-- Settings --}}
        <a href="{{ route('settings.index') }}"
        wire:navigate
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition hover:bg-white hover:text-indigo-600" >
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.5 6h3m-3 12h3m-9-6h3m9 0h3M12 3v3m0 12v3M5.64 5.64l2.12 2.12m8.48 8.48 2.12 2.12m0-12.72-2.12 2.12m-8.48 8.48-2.12 2.12"/>
                <circle cx="12" cy="12" r="4"/>
            </svg>
            Settings
        </a>

    </nav>

    {{-- Sidebar Footer --}}
    <div class="border-t border-slate-200 p-4">
        <div class="flex items-center gap-3 rounded-xl border border-slate-200 bg-white p-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-600 font-bold text-white">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>

            <div class="min-w-0">
                <p class="truncate text-sm font-semibold text-slate-800">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </p>
                <p class="text-xs text-slate-500">Store Administrator</p>
            </div>
        </div>
    </div>

</aside>

    {{-- Main Area --}}
    <div class="min-h-screen lg:pl-72">

        {{-- Top Header --}}
        <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white/90 px-4 backdrop-blur-lg sm:px-6 lg:px-8">

            <div class="flex min-w-0 items-center gap-3">

                {{-- Mobile Menu Button --}}
                <button
                    @click="sidebarOpen = true"
                    class="rounded-xl border border-slate-200 bg-white p-2.5 text-slate-600 hover:bg-slate-100 lg:hidden"
                    aria-label="Open navigation">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>

                <div class="min-w-0">
                    <h2 class="truncate text-lg font-bold text-slate-900 sm:text-xl">
                        {{ $heading ?? 'Dashboard' }}
                    </h2>
                    <p class="hidden text-xs text-slate-500 sm:block">
                        Welcome back to Mahasasto Shop
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-2 sm:gap-4">

                {{-- Search --}}
                <form action="{{ url('/admin/products') }}" method="GET"
                      class="relative hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m21 21-4.35-4.35m1.35-5.4a6.75 6.75 0 1 1-13.5 0 6.75 6.75 0 0 1 13.5 0Z"/>
                    </svg>
                    <input
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search products..."
                        class="w-48 rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-10 pr-4 text-sm outline-none transition focus:border-indigo-400 focus:bg-white focus:ring-4 focus:ring-indigo-50 lg:w-64">
                </form>

                {{-- Notifications --}}
                <button
                    type="button"
                    aria-label="Notifications"
                    class="relative rounded-xl border border-slate-200 bg-white p-2.5 text-slate-600 transition hover:bg-slate-50">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.25 18.75a2.25 2.25 0 0 1-4.5 0m9-2.25H5.25c1.1-1.1 1.5-2.25 1.5-6a5.25 5.25 0 0 1 10.5 0c0 3.75.4 4.9 1.5 6Z"/>
                    </svg>
                    <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>

                {{-- Profile Dropdown --}}
                <div x-data="{ open: false }" class="relative">

                    <button
                        @click="open = !open"
                        @keydown.escape.window="open = false"
                        :aria-expanded="open"
                        class="flex items-center gap-2 rounded-xl p-1.5 transition hover:bg-slate-100">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-indigo-600 to-violet-600 font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>

                        <span class="hidden text-sm font-semibold text-slate-700 xl:block">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </span>

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor"
                             class="hidden h-4 w-4 text-slate-500 transition sm:block"
                             :class="{ 'rotate-180': open }">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>

                    <div
                        x-cloak
                        x-show="open"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-transition.origin.top.right
                        class="absolute right-0 z-50 mt-3 w-56 overflow-hidden rounded-xl border border-slate-200 bg-white py-2 shadow-xl">

                        <div class="border-b border-slate-100 px-4 py-3">
                            <p class="truncate text-sm font-semibold text-slate-900">
                                {{ Auth::user()->name ?? 'Administrator' }}
                            </p>
                            <p class="truncate text-xs text-slate-500">
                                {{ Auth::user()->email ?? '' }}
                            </p>
                        </div>

                        <a href="{{ url('/profile') }}"
                           class="flex items-center gap-3 px-4 py-3 text-sm text-slate-600 hover:bg-slate-50">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.8" stroke="currentColor"
                                 class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.5-1.632Z"/>
                            </svg>
                            My Profile
                        </a>

                        <div class="my-1 border-t border-slate-100"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="flex w-full items-center gap-3 px-4 py-3 text-left text-sm text-red-600 hover:bg-red-50">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.8" stroke="currentColor"
                                     class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3-3H9m0 0 3-3m-3 3 3 3"/>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </header>

        {{-- Page Content --}}
        <main class="p-4 sm:p-6 lg:p-8">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-5 w-5 shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>
</div>
@livewireScripts
</body>
</html>
