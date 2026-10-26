{{-- Home Slider Section --}}
<section
    x-data="{
        active: 0,
        total: {{ $sliders->count() }},
        init() {
            if (this.total > 1) {
                setInterval(() => {
                    this.active = (this.active + 1) % this.total;
                }, 5000);
            }
        }
    }"
    class="relative w-full overflow-hidden bg-white">

    {{-- Slides --}}
    <div class="relative h-[150px] sm:h-[240px] lg:h-[400px]">

        @foreach($sliders as $index => $slider)
            <div
                class="absolute inset-0 transition-opacity duration-700"
                :class="active === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'">

                <a href="{{ $slider->button_link ?: '#' }}"
                   @if($slider->button_link) target="_blank" @endif
                   class="block h-full w-full">

                    <picture class="block h-full w-full">
                        @if($slider->mobile_image)
                            <source
                                media="(max-width: 767px)"
                                srcset="{{ asset('storage/' . $slider->mobile_image) }}">
                        @endif

                        <img
                            src="{{ asset('storage/' . $slider->desktop_image) }}"
                            alt="{{ $slider->title ?: 'Banner' }}"
                            class="block h-full w-full object-cover object-center"
                            fetchpriority="{{ $loop->first ? 'high' : 'auto' }}"
                            loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                    </picture>

                </a>
            </div>
        @endforeach

    </div>

    {{-- Dots (optional, delete this block if you don't want them) --}}
    @if($sliders->count() > 1)
        <div class="absolute bottom-2 left-1/2 z-20 flex -translate-x-1/2 gap-2">
            @foreach($sliders as $index => $slider)
                <button
                    type="button"
                    @click="active = {{ $index }}"
                    :class="active === {{ $index }} ? 'bg-white' : 'bg-white/50'"
                    class="h-2.5 w-2.5 rounded-full shadow transition"
                    aria-label="Go to slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    @endif

</section>