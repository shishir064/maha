@if($banners->isNotEmpty())

<section class="py-8 bg-white">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">

        @foreach($banners as $banner)

            <a href="" class="block group">

                <div class="relative overflow-hidden rounded shadow-lg">

                    <img
                        src="{{ asset('storage/'.$banner->image) }}"
                        alt="Advertisement Banner"
                        class="w-full h-[320px] md:h-[340px] lg:h-[420px]
                               object-fill transition-all duration-500 ease-out
                               hover:scale-105">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition duration-300"></div>

                </div>

            </a>

        @endforeach

    </div>
</section>

@endif