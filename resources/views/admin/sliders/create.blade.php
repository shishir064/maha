@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6">
        <div class="mx-auto max-w-5xl">

            {{-- Header --}}
            <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-teal-600">
                        Marketing / sliders
                    </p>
                    <h1 class="mt-1 text-2xl font-bold text-slate-800">
                        Create Advertisement Slider
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Create a responsive banner for your homepage.
                    </p>
                </div>

                <a href="{{ route('admin.sliders.index') }}"
                   class="rounded-xl border border-slate-300 bg-white px-4 py-2.5
                          text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                    Back to Advertisements
                </a>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    <p class="mb-2 font-semibold">Please fix the following errors:</p>
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.sliders.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf

                {{-- Banner Content --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-bold text-slate-800">Banner Content</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Add the heading and supporting text displayed on the slider.
                        </p>
                    </div>

                    <div class="space-y-5">
                    
                      

                        <div class="grid gap-5 sm:grid-cols-2">
                            

                            <div>
                                <label for="button_link" class="mb-2 block text-sm font-semibold text-slate-700">
                                    Redirect URL <span class="text-red-500">*</span>
                                </label>
                                <input id="button_link" type="url" name="button_link"
                                       value="{{ old('button_link') }}" required
                                       placeholder="https://example.com/products"
                                       class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm
                                              focus:border-teal-500 focus:ring-teal-500">
                                <p class="mt-1.5 text-xs text-slate-500">
                                    Customers will visit this URL when they click the button.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Images --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-bold text-slate-800">Banner Images</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Upload separate images for desktop and mobile screens.
                        </p>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        {{-- Desktop Image --}}
                        <div>
                            <label for="desktop_image" class="mb-2 block text-sm font-semibold text-slate-700">
                                Desktop Image <span class="text-red-500">*</span>
                            </label>

                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                                <img id="desktopPreview"
                                     src="https://placehold.co/1200x500?text=Desktop+Banner+Preview"
                                     alt="Desktop banner preview"
                                     class="h-52 w-full object-cover">
                            </div>

                            <input id="desktop_image" type="file" name="desktop_image"
                                   accept="image/jpeg,image/png,image/webp"
                                   required
                                   class="mt-3 block w-full rounded-xl border border-slate-300 bg-white
                                          text-sm text-slate-600 file:mr-4 file:border-0
                                          file:bg-teal-50 file:px-4 file:py-3 file:font-semibold
                                          file:text-teal-700 hover:file:bg-teal-100">

                            <p class="mt-2 text-xs text-slate-500">
                                Recommended: 1200 × 500 px. JPG, PNG or WebP.
                            </p>
                        </div>

                        {{-- Mobile Image --}}
                        <div>
                            <label for="mobile_image" class="mb-2 block text-sm font-semibold text-slate-700">
                                Mobile Image <span class="text-red-500">*</span>
                            </label>

                            <div class="flex justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-50 p-3">
                                <img id="mobilePreview"
                                     src="https://placehold.co/500x700?text=Mobile+Banner+Preview"
                                     alt="Mobile banner preview"
                                     class="h-64 w-44 rounded-lg object-cover">
                            </div>

                            <input id="mobile_image" type="file" name="mobile_image"
                                   accept="image/jpeg,image/png,image/webp"
                                   required
                                   class="mt-3 block w-full rounded-xl border border-slate-300 bg-white
                                          text-sm text-slate-600 file:mr-4 file:border-0
                                          file:bg-teal-50 file:px-4 file:py-3 file:font-semibold
                                          file:text-teal-700 hover:file:bg-teal-100">

                            <p class="mt-2 text-xs text-slate-500">
                                Recommended: 500 × 700 px. JPG, PNG or WebP.
                            </p>
                        </div>
                    </div>
                </section>


                {{-- Schedule --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-bold text-slate-800">Display Schedule</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Set when the banner should be eligible to appear.
                        </p>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="start_at" class="mb-2 block text-sm font-semibold text-slate-700">
                                Start Date and Time <span class="text-red-500">*</span>
                            </label>
                            <input id="start_at" type="datetime-local" name="start_at"
                                   value="{{ old('start_at') }}" required
                                   class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm
                                          focus:border-teal-500 focus:ring-teal-500">
                        </div>

                        <div>
                            <label for="end_at" class="mb-2 block text-sm font-semibold text-slate-700">
                                End Date and Time <span class="text-red-500">*</span>
                            </label>
                            <input id="end_at" type="datetime-local" name="end_at"
                                   value="{{ old('end_at') }}" required
                                   class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm
                                          focus:border-teal-500 focus:ring-teal-500">
                        </div>
                    </div>
                </section>

                {{-- Status --}}
                <section class="flex flex-wrap items-center justify-between gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
                    <div>
                        <h2 class="font-bold text-slate-800">Advertisement Status</h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Only active banners within their scheduled period should be displayed.
                        </p>
                    </div>

                    <label class="inline-flex cursor-pointer items-center gap-3">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1"
                               @checked(old('status', '1') == '1')
                               class="h-5 w-5 rounded border-slate-300 text-teal-600
                                      focus:ring-teal-500">
                        <span class="text-sm font-semibold text-slate-700">Active</span>
                    </label>
                </section>

                {{-- Actions --}}
                <div class="flex flex-wrap justify-end gap-3 pb-6">
                    <a href="{{ route('admin.advertisement.index') }}"
                       class="rounded-xl border border-slate-300 bg-white px-6 py-3
                              text-sm font-semibold text-slate-700 hover:bg-slate-100">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-xl bg-teal-600 px-7 py-3 text-sm font-bold
                                   text-white shadow-sm transition hover:bg-teal-700
                                   focus:outline-none focus:ring-4 focus:ring-teal-200">
                        Save Advertisement
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Image Preview --}}
    <script>
        function previewImage(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);

            input.addEventListener('change', function () {
                const file = this.files[0];

                if (file && file.type.startsWith('image/')) {
                    const imageUrl = URL.createObjectURL(file);
                    preview.src = imageUrl;
                }
            });
        }

        previewImage('desktop_image', 'desktopPreview');
        previewImage('mobile_image', 'mobilePreview');
    </script>
@endsection