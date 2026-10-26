
<section class="bg-white py-8">
    <div class="px-4 sm:px-6 lg:px-8">

        <h2 class="mb-6 text-2xl font-bold text-slate-800">
            Shop by Category
        </h2>

        {{-- Reusable Swiper Container --}}
        <div class="swiper-container relative px-2">

            <div class="swiper">
                <div class="swiper-wrapper">

                    @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <a href="#"
                               class="group flex flex-col items-center text-center">

                                {{-- Circular Category Image --}}
                                <div class="flex h-32 w-32 items-center justify-center
                                            overflow-hidden rounded-full border-2 border-slate-100
                                            bg-slate-50 shadow-sm transition-all duration-300
                                            group-hover:scale-105 group-hover:border-cyan-400
                                            group-hover:shadow-lg sm:h-36 sm:w-36">

                                    @if ($category->image)
                                        <img
                                            src="{{ asset('storage/' . $category->image) }}"
                                            alt="{{ $category->name }}"
                                            class="h-full w-full rounded-full object-cover
                                                   transition-transform duration-500
                                                   group-hover:scale-110"
                                        >
                                    @else
                                        <span class="text-sm text-slate-400">
                                            No image
                                        </span>
                                    @endif

                                </div>

                                <h3 class="mt-4 text-sm font-semibold text-slate-700
                                           transition-colors duration-300
                                           group-hover:text-cyan-600 sm:text-base">
                                    {{ $category->name }}
                                </h3>

                            </a>
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
