@props(['product'])

@php
    $discount = (float) ($product['discount'] ?? 0);
    $image = $product['image'] ?? null;
    $inStock = $product['in_stock'] ?? false;
    $price = (float) ($product['price'] ?? 0);

    $finalPrice = (float) ($product['final_price'] ?? (
        $price - ($price * $discount / 100)
    ));
@endphp

<div class="group relative flex h-[430px] w-full min-w-0 flex-col overflow-hidden rounded-xl border border-gray-100 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-4">

    {{-- Wishlist Button --}}
    <button type="button"
            class="absolute right-3 top-3 z-10 flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-400 shadow-sm transition hover:text-red-500"
            aria-label="Add to wishlist">
        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3.17 5.17a4 4 0 015.66 0L10 6.34l1.17-1.17a4 4 0 115.66 5.66L10 17.66l-6.83-6.83a4 4 0 010-5.66z"/>
        </svg>
    </button>

    {{-- Discount Badge --}}
    @if($discount > 0)
        <span class="absolute left-3 top-3 z-10 rounded-full bg-red-600 px-2 py-1 text-[10px] font-bold text-white sm:text-xs">
            -{{ rtrim(rtrim(number_format($discount, 2), '0'), '.') }}%
        </span>
    @endif

    {{-- Linkable Product Details --}}
<a href="{{ route('products.details', $product->slug) }}"
       class="flex min-h-0 flex-1 flex-col">

        {{-- Product Image --}}
        <div class="flex h-[190px] w-full shrink-0 items-center justify-center overflow-hidden">
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
        </div>

        {{-- Product Information --}}
        <div class="flex min-h-0 flex-1 flex-col">

            {{-- Product Name --}}
            <h3 class="mt-3 line-clamp-2 h-11 shrink-0 overflow-hidden text-sm font-semibold leading-5 text-slate-800 transition group-hover:text-cyan-600 sm:text-base">
                {{ $product['name'] ?? 'Unnamed Product' }}
            </h3>

            {{-- Stock Status --}}
            <div class="mt-2 flex h-6 shrink-0 items-center">
                @if($inStock)
                    <span class="rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-semibold text-green-700 sm:text-xs">
                        In Stock
                    </span>
                @else
                    <span class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-semibold text-gray-500 sm:text-xs">
                        Out of Stock
                    </span>
                @endif
            </div>

            {{-- Price --}}
            <div class="mt-2 flex h-12 shrink-0 flex-col justify-center overflow-hidden">
                <span class="truncate text-base font-bold text-slate-900 sm:text-lg">
                    रु. {{ number_format($finalPrice, 2) }}
                </span>

                @if($discount > 0)
                    <span class="truncate text-xs text-gray-400 line-through">
                        रु. {{ number_format($price, 2) }}
                    </span>
                @endif
            </div>

        </div>

    </a>

    {{-- Add to Cart (Outside Link) --}}
    <div class="mt-auto w-full shrink-0 pt-3">
        <livewire:add-to-cart
            :product="$product"
            :key="'add-to-cart-'.$product->id"
        />
    </div>

</div>
