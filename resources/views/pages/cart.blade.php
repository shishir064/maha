
@extends('layouts.home')

@section('content')

    {{-- Breadcrumb --}}
    <div class="mx-auto mt-2 w-full px-4 sm:px-6 lg:px-8">
        <div class="rounded-lg bg-white px-5 py-4">
            <nav class="flex items-center gap-2 text-sm" aria-label="Breadcrumb">
                <a href="{{ url('/') }}"
                   wire:navigate
                   class="font-medium text-blue-700 hover:text-blue-900">
                    Home
                </a>

                <svg class="h-4 w-4 text-slate-400"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="m9 18 6-6-6-6" />
                </svg>

                <span class="font-medium text-slate-900">
                    Shopping Cart
                </span>
            </nav>
        </div>
    </div>

    {{-- Cart Section --}}
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <div class="mb-7">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                Shopping Cart
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                Review your selected products before checkout.
            </p>
        </div>

        <livewire:cart-items />

    </section>

@endsection
