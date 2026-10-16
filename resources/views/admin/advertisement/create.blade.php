@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl space-y-6">

            {{-- Page Header --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium text-indigo-600">
                        Marketing / Advertisements
                    </p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                        Create Advertisement
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Create and configure a banner for your storefront.
                    </p>
                </div>

                <div class="flex items-center gap-2 self-start rounded-full border border-indigo-100 bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm">
                    <span class="h-2 w-2 rounded-full bg-indigo-500"></span>
                    New Advertisement
                </div>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="rounded-xl border border-red-200 bg-red-50 p-4">
                    <div class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 9v3m0 4h.01M10.3 3.86L1.82 18a2 2 0 001.7 3h16.96a2 2 0 001.7-3L13.7 3.86a2 2 0 00-3.4 0z"/>
                        </svg>

                        <div>
                            <h3 class="font-semibold text-red-800">
                                Please correct the following errors
                            </h3>
                            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.advertisement.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf

                {{-- Banner Image Card --}}
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex items-center gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M4 16l4-4a2 2 0 012.828 0l2.344 2.344a2 2 0 002.828 0L20 10M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-slate-800">
                                Banner Image
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Upload the main promotional image for your website.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-7 p-5 sm:p-7 lg:grid-cols-2">

                        {{-- Image Preview --}}
                        <div>
                            <label class="text-sm font-semibold text-slate-700">
                                Image Preview
                            </label>

                            <div class="mt-3 flex aspect-[16/8] items-center justify-center overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
                                <img
                                    id="previewImage"
                                    src="https://placehold.co/1000x500/e2e8f0/64748b?text=Banner+Preview"
                                    alt="Advertisement banner preview"
                                    class="h-full w-full object-cover">
                            </div>

                            <p class="mt-2 text-xs text-slate-500">
                                Your selected image will appear here.
                            </p>
                        </div>

                        {{-- Image Upload --}}
                        <div>
                            <label for="imageInput"
                                   class="text-sm font-semibold text-slate-700">
                                Upload Banner
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="mt-3 flex min-h-[240px] flex-col items-center justify-center rounded-xl border-2 border-dashed border-indigo-200 bg-indigo-50/50 p-6 text-center transition hover:border-indigo-400">

                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-indigo-600 shadow-sm">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M12 16V4m0 0L7 9m5-5l5 5M5 16v3a1 1 0 001 1h12a1 1 0 001-1v-3"/>
                                    </svg>
                                </div>

                                <h3 class="mt-4 font-semibold text-slate-800">
                                    Choose a banner image
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    PNG, JPG or WEBP
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    Recommended size: 1600 × 500 px
                                </p>

                                <input
                                    id="imageInput"
                                    type="file"
                                    name="image"
                                    accept="image/jpeg,image/png,image/webp"
                                    required
                                    class="mt-5 block w-full max-w-sm text-sm text-slate-600
                                           file:mr-3 file:rounded-lg file:border-0
                                           file:bg-indigo-600 file:px-4 file:py-2.5
                                           file:font-semibold file:text-white
                                           hover:file:bg-indigo-700">

                                @error('image')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Advertisement Settings --}}
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="flex items-center gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-slate-800">
                                Advertisement Settings
                            </h2>
                            <p class="mt-1 text-sm text-slate-500">
                                Configure the destination, position and visibility.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-6 p-5 sm:p-7 lg:grid-cols-2">

                        {{-- Link Type --}}
                        <div>
                            <label for="link_type"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Link Type <span class="text-red-500">*</span>
                            </label>

                            <select
                                name="link_type"
                                id="link_type"
                                required
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                <option value="none" @selected(old('link_type', 'none') === 'none')>
                                    No Link
                                </option>
                                <option value="product" @selected(old('link_type') === 'product')>
                                    Product
                                </option>
                                <option value="category" @selected(old('link_type') === 'category')>
                                    Category
                                </option>
                                <option value="brand" @selected(old('link_type') === 'brand')>
                                    Brand
                                </option>
                            </select>

                            <p class="mt-2 text-xs text-slate-500">
                                Choose what visitors should open when clicking the banner.
                            </p>
                        </div>

                        {{-- Link Item --}}
                        <div>
                            <label for="link_id"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Select Item <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="link_id"
                                name="link_id"
                                required
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                <option value="">Select Item</option>
                            </select>

                            <p class="mt-2 text-xs text-slate-500">
                                Available items depend on your selected link type.
                            </p>
                        </div>

                        {{-- Position --}}
                        <div>
                            <label for="position"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Banner Position <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="position"
                                name="position"
                                required
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">
                                <option value="top_banner" @selected(old('position', 'top_banner') === 'top_banner')>
                                    Top Banner
                                </option>
                                <option value="bellowtop_banner" @selected(old('position') === 'bellowtop_banner')>
                                    Below Top Banner
                                </option>
                                <option value="middle_banner" @selected(old('position') === 'middle_banner')>
                                    Middle Banner
                                </option>
                                <option value="bellowmiddle_banner" @selected(old('position') === 'bellowmiddle_banner')>
                                    Below Middle Banner
                                </option>
                                <option value="bottom_banner" @selected(old('position') === 'bottom_banner')>
                                    Bottom Banner
                                </option>
                            </select>
                        </div>

                        {{-- Display Order --}}
                        <div>
                            <label for="sort_order"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Display Order <span class="text-red-500">*</span>
                            </label>

                            <input
                                id="sort_order"
                                type="number"
                                name="sort_order"
                                value="{{ old('sort_order', 1) }}"
                                min="1"
                                required
                                class="w-full rounded-xl border-slate-300 px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                            <p class="mt-2 text-xs text-slate-500">
                                Lower numbers appear first.
                            </p>
                        </div>

                        {{-- date for start and end  --}}
                        <div>
    <label for="start_at">Banner Start Date & Time</label>
    <input
        type="datetime-local"
        name="start_at"
        id="start_at"
        value="{{ old('start_at') }}"
        required
    >
    @error('start_at')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="end_at">Banner Expiry Date & Time</label>
    <input
        type="datetime-local"
        name="end_at"
        id="end_at"
        value="{{ old('end_at') }}"
        required
    >
    @error('end_at')
        <p class="text-red-500">{{ $message }}</p>
    @enderror
</div>

                        {{-- Status --}}
                        <div class="lg:col-span-2">
                            <label for="status"
                                   class="mb-2 block text-sm font-semibold text-slate-700">
                                Advertisement Status <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="status"
                                name="status"
                                required
                                class="w-full rounded-xl border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 sm:max-w-md">
                                <option value="1" @selected(old('status', '1') == '1')>
                                    Active — Display this advertisement
                                </option>
                                <option value="0" @selected(old('status') == '0')>
                                    Inactive — Keep hidden from the website
                                </option>
                            </select>
                        </div>

                    </div>
                </div>

                {{-- Submit Section --}}
                <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:flex-row sm:items-center sm:justify-between sm:px-7">

                    <div>
                        <h3 class="font-bold text-slate-800">
                            Ready to save?
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Review your settings before creating the advertisement.
                        </p>
                    </div>

                    <div class="flex flex-col-reverse gap-3 sm:flex-row">
                        <button
                            type="reset"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                            Reset Form
                        </button>

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                            Save Advertisement
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{-- Image Preview and AJAX Item Loading --}}
  
<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');
    const linkType = document.getElementById('link_type');
    const linkId = document.getElementById('link_id');
    const resetButton = document.querySelector('button[type="reset"]');

    // Build the URL directly. No missing Laravel route parameter.
    const itemsUrl = @json(url('/admin/advertisement/items'));

    let previewUrl = null;
    let requestController = null;

    // Preview selected image
    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) return;

        if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
            alert('Please select a JPG, PNG, or WEBP image.');
            this.value = '';
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        previewImage.src = previewUrl;
    });

    // Load products, categories, or brands
    async function loadItems(type, selectedId = '') {
        if (requestController) {
            requestController.abort();
        }

        linkId.replaceChildren();

        if (type === 'none') {
            linkId.add(new Option('No item required', ''));
            linkId.disabled = true;
            linkId.required = false;
            return;
        }

        linkId.disabled = false;
        linkId.required = true;
        linkId.add(new Option('Loading items...', ''));

        requestController = new AbortController();

        try {
            const response = await fetch(
                `${itemsUrl}/${encodeURIComponent(type)}`,
                {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    signal: requestController.signal
                }
            );

            if (!response.ok) {
                const message = await response.text();
                throw new Error(`HTTP ${response.status}: ${message}`);
            }

            const data = await response.json();

            if (!Array.isArray(data)) {
                throw new Error('The server did not return a valid item list.');
            }

            linkId.replaceChildren();
            linkId.add(new Option(
                data.length ? 'Select Item' : 'No items available',
                ''
            ));

            data.forEach(function (item) {
                const option = new Option(item.name, item.id);
                option.selected = String(item.id) === String(selectedId);
                linkId.add(option);
            });

        } catch (error) {
            if (error.name === 'AbortError') return;

            console.error('Advertisement item loading error:', error);

            linkId.replaceChildren();
            linkId.add(new Option('Unable to load items', ''));
        }
    }

    linkType.addEventListener('change', function () {
        loadItems(this.value);
    });

    // Restore previous values after validation errors
    const previousItem = @json(old('link_id', ''));

    loadItems(linkType.value, previousItem);

    // Reset the form
    resetButton.addEventListener('click', function () {
        setTimeout(function () {
            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            previewImage.src =
                'https://placehold.co/1000x500/e2e8f0/64748b?text=Banner+Preview';

            loadItems(linkType.value);
        }, 0);
    });
});
</script>

@endsection