@props(['product'])
<div class="group relative grid grid-cols-1 gap-4 h-[430px] w-full min-w-0 flex-col overflow-hidden rounded-xl border border-gray-100 bg-white p-4 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">
    {{-- Wishlist Button --}}
    <button type="button"
            class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:text-red-500"
            aria-label="Add to wishlist">
        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3.17 5.17a4 4 0 015.66 0L10 6.34l1.17-1.17a4 4 0 115.66 5.66L10 17.66l-6.83-6.83a4 4 0 010-5.66z"/>
        </svg>
    </button>

   {{-- Discount Badge --}}
@php
    $discount = $product['discount'] ?? 0;
@endphp

@if($discount > 0)
    <span class="absolute left-3 top-3 z-10 rounded-full bg-red-600 px-2 py-1 text-[10px] font-bold text-white sm:text-xs">
        -{{ rtrim(rtrim(number_format((float) $discount, 2), '0'), '.') }}%
    </span>
@endif
   {{-- Product Image --}}
@php
    $image = $product['image'] ?? null;
@endphp

@if($image)
    <img
        src="{{ asset('storage/' . $image) }}"
        alt="{{ $product['name'] ?? 'Product image' }}"
        class="h-full w-full object-contain"
    >
@else
    <div class="flex h-full w-full items-center justify-center bg-gray-100 text-sm text-gray-400">
        No image available
    </div>
@endif

   
{{-- Product Information --}}
<div class="flex min-h-0 flex-1 flex-col">

    {{-- Product Name --}}
    <a href="#" class="mt-3 block">
        <h3 class="line-clamp-2 h-11 overflow-hidden text-sm font-semibold leading-5 text-slate-800 sm:text-base">
            {{ $product['name'] ?? 'Unnamed Product' }}
        </h3>
    </a>

    {{-- Stock Status --}}
    @php
        $inStock = $product['in_stock'] ?? false;
        $discount = (float) ($product['discount'] ?? 0);
        $price = (float) ($product['price'] ?? 0);
        $finalPrice = (float) ($product['final_price'] ?? (
            $price - ($price * $discount / 100)
        ));
    @endphp

    <div class="mt-2 h-6 shrink-0">
        @if($inStock)
            <span class="inline-block rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-semibold text-green-700 sm:text-xs">
                In Stock
            </span>
        @else
            <span class="inline-block rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 sm:text-xs">
                Out of Stock
            </span>
        @endif
    </div>

    {{-- Price --}}
    <div class="mt-2 flex min-h-[48px] flex-col justify-center gap-0.5 overflow-hidden">
        <span class="truncate text-base font-bold text-slate-900 sm:text-lg">
            रु. {{ number_format($finalPrice, 2) }}
        </span>

        @if($discount > 0)
            <span class="truncate text-xs text-gray-400 line-through">
                रु. {{ number_format($price, 2) }}
            </span>
        @endif
    </div>

    {{-- Add to Cart --}}
    {{-- <form action="#" method="POST" class="mt-auto pt-3">
        @csrf

        <input
            type="hidden"
            name="product_id"
            value="{{ $product['id'] ?? '' }}"
        >

        <button
            type="submit"
            @disabled(!$inStock)
            class="flex h-10 w-full items-center justify-center gap-1.5 rounded-lg bg-blue-700 px-2 text-xs font-semibold text-white transition hover:bg-blue-800 disabled:cursor-not-allowed disabled:bg-gray-300 sm:gap-2 sm:text-sm"
        >
            <svg
                class="h-4 w-4 shrink-0 sm:h-5 sm:w-5"
                fill="currentColor"
                viewBox="0 0 20 20">
                <path d="M3 1a1 1 0 000 2h1.2l.4 2 1.3 6.5A2 2 0 007.9 13h6.2a2 2 0 002-1.5L17.4 6H5.8l-.4-2A2 2 0 003.4 2.4L3 1zM8 16a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6 0a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"/>
            </svg>
            <span>

                <livewire:add-to-cart
        :product="$product"
        :key="'add-to-cart-'.$product->id"/>
            </span>
            <span class="truncate">Add To Cart</span>
        </button>
    </form> --}}
    {{-- Add to Cart --}}
<div class="mt-auto w-full pt-3">
    <livewire:add-to-cart
        :product="$product"
        :key="'add-to-cart-'.$product->id"/>
</div>

</div>

</div>
