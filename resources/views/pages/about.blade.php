
@extends('layouts.home')

@section('content')

<div class="bg-white text-slate-800">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-slate-50">
        <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-teal-100/60 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-20 h-72 w-72 rounded-full bg-amber-100/50 blur-3xl"></div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-2 lg:px-8 lg:py-24">

            <div>
                {{-- Breadcrumb --}}
                <nav aria-label="Breadcrumb" class="mb-6 flex items-center gap-2 text-sm">
                    <a href="{{ url('/') }}"
                       class="text-slate-500 transition hover:text-teal-700">
                        Home
                    </a>

                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-4 w-4 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m9 18 6-6-6-6"/>
                    </svg>

                    <span aria-current="page" class="font-semibold text-teal-700">
                        About Us
                    </span>
                </nav>

                <span class="inline-flex items-center gap-2 rounded-full border border-teal-200 bg-teal-50 px-4 py-2 text-xs font-bold uppercase tracking-wider text-teal-800">
                    <span class="h-2 w-2 rounded-full bg-teal-600"></span>
                    Get to know us
                </span>

                <h1 class="mt-6 text-4xl font-extrabold leading-tight tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                    Shopping made
                    <span class="text-teal-700">simple.</span>
                    <br>
                    Life made better.
                </h1>

                <p class="mt-6 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">
                    Welcome to Mahasasto Shop, your online shopping destination.
                    We bring a variety of products together to make discovering
                    and shopping for the things you need easier and more convenient.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ url('/shop') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-700 px-6 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-teal-800">
                        Explore Products

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor"
                             class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>

                    <a href="{{ url('/contact') }}"
                       class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 transition hover:border-teal-600 hover:text-teal-700">
                        Contact Us
                    </a>
                </div>
            </div>

            {{-- Hero Image --}}
            <div class="relative mx-auto w-full max-w-xl">
                <div class="absolute -inset-4 rounded-3xl bg-teal-100/70 rotate-3"></div>

                <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white p-3 shadow-xl">
                    <img
                        src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1200&q=85"
                        alt="A welcoming retail shopping environment"
                        class="h-72 w-full rounded-2xl object-cover sm:h-96"
                        loading="eager">

                    <div class="absolute bottom-7 left-7 right-7 rounded-2xl border border-white/70 bg-white/95 p-5 shadow-lg backdrop-blur">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-teal-100 text-teal-800">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.8" stroke="currentColor"
                                     class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 3h1.386a1.5 1.5 0 0 1 1.455 1.136L5.5 6.75m0 0h14.25l-1.5 7.5H7L5.5 6.75Zm2.25 12.375a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm9 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                                </svg>
                            </div>

                            <div>
                                <p class="font-bold text-slate-900">Your everyday shopping partner</p>
                                <p class="mt-1 text-sm text-slate-500">Convenience, choice and value.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Shopping Benefits --}}
    <section class="border-y border-slate-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:grid-cols-2 sm:px-6 lg:grid-cols-3 lg:px-8">

            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-teal-50 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75M12 3l7.5 4.5v9L12 21l-7.5-4.5v-9L12 3Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">Product Variety</h3>
                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Explore a range of products in one convenient place.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v6l4 2m5-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">Convenient Shopping</h3>
                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Browse products and shop from wherever you are.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">Customer Focus</h3>
                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        We're here to help you with your shopping questions and needs.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Our Story --}}
    <section class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-16 sm:px-6 sm:py-20 lg:grid-cols-2 lg:px-8">

        <div class="relative">
            <div class="overflow-hidden rounded-3xl bg-slate-100">
                <img
                    src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=85"
                    alt="Customer shopping and making a purchase"
                    loading="lazy"
                    class="h-72 w-full object-cover sm:h-96">
            </div>

            <div class="absolute -bottom-5 right-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-lg sm:-right-5">
                <p class="text-sm font-bold text-teal-700">Mahasasto Shop</p>
                <p class="mt-1 text-xs text-slate-500">Shopping with convenience in mind</p>
            </div>
        </div>

        <div class="pt-4 lg:pt-0">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-teal-700">
                Our Story
            </p>

            <h2 class="mt-4 text-3xl font-extrabold leading-tight text-slate-900 sm:text-4xl">
                Making online shopping a better experience
            </h2>

            <p class="mt-6 leading-8 text-slate-600">
                Mahasasto Shop was created with a simple idea: make it easier
                for customers to discover products and shop conveniently online.
                We aim to provide a straightforward shopping experience where
                customers can explore products, compare options and find what
                suits their needs.
            </p>

            <p class="mt-4 leading-8 text-slate-600">
                We believe a good shopping experience goes beyond products.
                It also means clear information, easy navigation and helpful
                customer support whenever assistance is needed.
            </p>

            <div class="mt-8 space-y-4">
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor"
                         class="mt-0.5 h-5 w-5 shrink-0 text-teal-700">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                    </svg>
                    <p class="text-sm leading-6 text-slate-700">
                        A convenient place to discover products.
                    </p>
                </div>

                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor"
                         class="mt-0.5 h-5 w-5 shrink-0 text-teal-700">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                    </svg>
                    <p class="text-sm leading-6 text-slate-700">
                        An easy-to-use online shopping experience.
                    </p>
                </div>

                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor"
                         class="mt-0.5 h-5 w-5 shrink-0 text-teal-700">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                    </svg>
                    <p class="text-sm leading-6 text-slate-700">
                        Support for customers throughout their shopping journey.
                    </p>
                </div>
            </div>
        </div>

    </section>

    {{-- Mission and Vision --}}
    <section class="bg-slate-50 py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mx-auto max-w-2xl text-center">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-teal-700">
                    What Drives Us
                </p>

                <h2 class="mt-3 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                    Our mission and vision
                </h2>

                <p class="mt-4 leading-7 text-slate-600">
                    Our focus is on creating a shopping experience that is
                    convenient, accessible and centered on customer needs.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2">

                {{-- Mission --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md sm:p-9">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-100 text-teal-800">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor"
                             class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 3v18h18M7.5 14.25l3-3 3 3 5.25-6"/>
                        </svg>
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">
                        Our Mission
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        To make online shopping simpler and more convenient by
                        bringing useful product choices together and helping
                        customers make informed purchasing decisions.
                    </p>
                </div>

                {{-- Vision --}}
                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-md sm:p-9">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-100 text-amber-800">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor"
                             class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12s3.5-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.5 7.5-9.75 7.5S2.25 12 2.25 12Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </div>

                    <h3 class="mt-6 text-xl font-bold text-slate-900">
                        Our Vision
                    </h3>

                    <p class="mt-3 leading-7 text-slate-600">
                        To become a trusted online shopping destination known
                        for convenience, a thoughtful product selection and
                        a positive customer experience.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Our Values --}}
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-20 lg:px-8">

        <div class="mx-auto max-w-2xl text-center">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-teal-700">
                Our Values
            </p>

            <h2 class="mt-3 text-3xl font-extrabold text-slate-900 sm:text-4xl">
                What matters to us
            </h2>
        </div>

        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

            <div class="text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-teal-50 text-teal-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3 4.5 6v5.25c0 4.5 3.15 7.65 7.5 9.75 4.35-2.1 7.5-5.25 7.5-9.75V6L12 3Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-slate-900">Trust</h3>
                <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                    We aim to provide clear product information and a dependable shopping experience.
                </p>
            </div>

            <div class="text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-amber-50 text-amber-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8.25v3.75l2.25 2.25M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-slate-900">Convenience</h3>
                <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                    We want customers to spend less time searching and more time finding what they need.
                </p>
            </div>

            <div class="text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50 text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M18 18.72a9.094 9.094 0 0 0 3.75-1.524 3.75 3.75 0 0 0-5.916-3.268M18 18.72v-.004c0-1.106-.3-2.142-.824-3.032M18 18.72v.004a12.318 12.318 0 0 1-12 0v-.004m12 0a12.28 12.28 0 0 0-12 0m0 0a3.75 3.75 0 0 1-5.916-3.268A9.094 9.094 0 0 1 6 18.72m0 0v-.004c0-1.106.3-2.142.824-3.032M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <h3 class="mt-5 font-bold text-slate-900">Customer First</h3>
                <p class="mx-auto mt-2 max-w-sm text-sm leading-6 text-slate-500">
                    We value customer feedback and aim to make every interaction helpful.
                </p>
            </div>

        </div>
    </section>

    {{-- Call to Action --}}
    <section class="px-4 pb-16 sm:px-6 sm:pb-20 lg:px-8">
        <div class="relative mx-auto max-w-7xl overflow-hidden rounded-3xl bg-teal-800 px-6 py-12 sm:px-12 sm:py-16">
            <div class="absolute -right-16 -top-24 h-72 w-72 rounded-full border-[40px] border-white/5"></div>
            <div class="absolute -bottom-24 -left-10 h-56 w-56 rounded-full bg-teal-700"></div>

            <div class="relative flex flex-col items-start justify-between gap-8 md:flex-row md:items-center">
                <div class="max-w-2xl">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-teal-200">
                        Start Shopping
                    </p>

                    <h2 class="mt-3 text-3xl font-extrabold text-white sm:text-4xl">
                        Find something you'll love.
                    </h2>

                    <p class="mt-4 max-w-xl leading-7 text-teal-50">
                        Discover our products and enjoy a more convenient way to shop.
                        We're here to help you along the way.
                    </p>
                </div>

                <div class="flex shrink-0 flex-wrap gap-3">
                    <a href="{{ url('/shop') }}"
                       class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-teal-800 transition hover:bg-teal-50">
                        Shop Now

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor"
                             class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>

                    <a href="{{ url('/contact') }}"
                       class="inline-flex items-center rounded-xl border border-teal-300 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-teal-700">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
