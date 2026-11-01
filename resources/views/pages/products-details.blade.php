@extends('layouts.home')

@section('content')

@php
    $discount = (float) ($product['discount'] ?? 0);
    $image = $product['image'] ?? null;
    $inStock = $product['in_stock'] ?? false;
    $price = (float) ($product['price'] ?? 0);

    $finalPrice = (float) ($product['final_price'] ?? (
        $price - ($price * $discount / 100)
    ));
@endphp

<section class="min-h-screen bg-white">

    {{-- Breadcrumb --}}
    <div class="border-b border-slate-100 bg-slate-50 px-4 py-4 sm:px-8 lg:px-12">
        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
            <a href="{{ url('/') }}" class="hover:text-cyan-600">Home</a>
            <i class="fas fa-chevron-right text-xs"></i>
            <span>Products</span>
            <i class="fas fa-chevron-right text-xs"></i>
            <span class="font-medium text-slate-800">
                {{ $product['name'] }}
            </span>
        </div>
    </div>

    {{-- Product Details --}}
    <div class="grid grid-cols-1 gap-8 px-4 py-8 sm:px-8 lg:grid-cols-2 lg:gap-14 lg:px-12 lg:py-12">

        {{-- Product Image --}}
        <div class="relative flex min-h-[350px] items-center justify-center bg-slate-50 p-6 sm:min-h-[500px] lg:min-h-[550px]">

            @if($discount > 0)
                <span class="absolute left-5 top-5 z-10 rounded-full bg-red-600 px-4 py-2 text-sm font-bold text-white">
                    -{{ rtrim(rtrim(number_format($discount, 2), '0'), '.') }}% OFF
                </span>
            @endif

            @if($image)
                <img
                    src="{{ asset('storage/' . $image) }}"
                    alt="{{ $product['name'] }}"
                    class="max-h-[480px] w-full object-contain"
                >
            @else
                <div class="flex h-80 w-full items-center justify-center text-gray-400">
                    <i class="fas fa-image mr-2 text-3xl"></i>
                    No image available
                </div>
            @endif

        </div>

        {{-- Product Information --}}
        <div class="flex flex-col py-2 lg:py-5">

            <h1 class="text-2xl font-bold leading-tight text-slate-900 sm:text-3xl lg:text-4xl">
                {{ $product['name'] }}
            </h1>

            {{-- SKU --}}
            @if(!empty($product['sku']))
                <p class="mt-3 text-sm text-slate-500">
                    SKU:
                    <span class="font-medium text-slate-700">
                        {{ $product['sku'] }}
                    </span>
                </p>
            @endif

            {{-- Stock Status --}}
            <div class="mt-5">
                @if($inStock)
                    <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-3 py-1.5 text-sm font-semibold text-green-700">
                        <i class="fas fa-check-circle"></i>
                        In Stock
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-sm font-semibold text-red-600">
                        <i class="fas fa-times-circle"></i>
                        Out of Stock
                    </span>
                @endif
            </div>

            {{-- Price --}}
            <div class="mt-7 border-b border-slate-100 pb-7">

                <div class="flex flex-wrap items-center gap-3">

                    <span class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                        रु. {{ number_format($finalPrice, 2) }}
                    </span>

                    @if($discount > 0)
                        <span class="text-lg text-slate-400 line-through">
                            रु. {{ number_format($price, 2) }}
                        </span>
                    @endif

                </div>

                @if($discount > 0)
                    <p class="mt-2 text-sm font-medium text-green-600">
                        You save रु. {{ number_format($price - $finalPrice, 2) }}
                    </p>
                @endif

            </div>

            {{-- Description --}}
            <div class="mt-7">
                <h2 class="mb-3 text-lg font-bold text-slate-800">
                    Product Description
                </h2>

                <div class="text-sm leading-7 text-slate-600">
                    {{ $product['description'] ?? 'No description available.' }}
                </div>
            </div>

            {{-- Brand and Category --}}
            <div class="mt-7 space-y-3 border-t border-slate-100 pt-5">

                @if(isset($product->brand))
                    <div class="flex gap-2 text-sm">
                        <span class="w-24 font-semibold text-slate-700">Brand:</span>
                        <span class="text-slate-600">
                            {{ $product->brand->name }}
                        </span>
                    </div>
                @endif

                @if(isset($product->category))
                    <div class="flex gap-2 text-sm">
                        <span class="w-24 font-semibold text-slate-700">Category:</span>
                        <span class="text-slate-600">
                            {{ $product->category->name }}
                        </span>
                    </div>
                @endif

            </div>

            {{-- Add To Cart --}}
            <div class="mt-auto pt-8">

                @if($inStock)
                    <livewire:add-to-cart
                        :product="$product"
                        :key="'add-to-cart-'.$product->id"
                    />
                @else
                    <button disabled
                        class="w-full cursor-not-allowed rounded-xl bg-gray-200 px-6 py-4 font-semibold text-gray-500">
                        Currently Unavailable
                    </button>
                @endif

            </div>

        </div>

    </div>

    {{-- Related Products --}}
    @if(isset($relatedproducts) && $relatedproducts->isNotEmpty())

        <section class="border-t border-slate-100 bg-slate-50 px-4 py-10 sm:px-8 lg:px-12 lg:py-14">

            <div class="mb-7 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">
                        Related Products
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        You may also like these products
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

                @foreach($relatedproducts as $relatedproduct)
                    <x-home.product-card :product="$relatedproduct" />
                @endforeach

            </div>

        </section>

    @endif

</section>

@endsection
