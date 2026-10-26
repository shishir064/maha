
<section class="bg-white py-8">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="mb-6 text-2xl font-bold text-slate-800">
            latest products
        </h2>

        {{-- Reusable Swiper Container --}}
        <div class="swiper-container relative px-2">

            <div class="swiper">
                <div class="swiper-wrapper">@foreach($products as $product)
    <div class="swiper-slide">
        <x-products_cart :product="$product" />
    </div>
@endforeach
                    
                </div>
            </div>

            {{-- Previous Button --}}
            <button type="button"
                    class="swiper-prev absolute -left-1 top-1/2 z-10
                           flex h-9 w-9 -translate-y-1/2 items-center
                           justify-center rounded-full bg-white text-cyan-600
                           shadow-md transition hover:bg-cyan-50"
                    aria-label="Previous category">
                &larr;
            </button>

            {{-- Next Button --}}
            <button type="button"
                    class="swiper-next absolute -right-1 top-1/2 z-10
                           flex h-9 w-9 -translate-y-1/2 items-center
                           justify-center rounded-full bg-white text-cyan-600
                           shadow-md transition hover:bg-cyan-50"
                    aria-label="Next category">
                &rarr;
            </button>

        </div>
    </div>
</section>
