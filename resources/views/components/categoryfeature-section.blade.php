
<section class="bg-white py-8">
    <div class="px-4 sm:px-6 lg:px-8">

        {{-- Heading and View All --}}
        <div class="mb-6 flex items-center justify-between gap-3">
            <h2 class="text-xl font-bold text-slate-800 sm:text-2xl">
                {{$featured->title}}
            </h2>

            <a href=""
            wire:navigate
               class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-teal-700">
                View All
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="2"
                     stroke="currentColor"
                     class="h-4 w-4">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>

        {{-- Product Slider --}}
        <div class="swiper-container relative px-2">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($products as $product)
                        <div class="swiper-slide">
                            <x-home.product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Previous Button --}}
            <button type="button"
                    class="swiper-prev absolute -left-1 top-1/2 z-10 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white text-teal-600 shadow-md transition hover:bg-teal-50"
                    aria-label="Previous products">
                &larr;
            </button>

            {{-- Next Button --}}
            <button type="button"
                    class="swiper-next absolute -right-1 top-1/2 z-10 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full bg-white text-teal-600 shadow-md transition hover:bg-teal-50"
                    aria-label="Next products">
                &rarr;
            </button>
        </div>

    </div>
</section>
