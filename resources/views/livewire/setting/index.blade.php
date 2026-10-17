<div class="mx-auto max-w-4xl space-y-6">

    {{-- Main s Form --}}
    <form action="{{ route('setting.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Basic Information Section --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-start gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M5 10V6l1-3h12l1 3v4M5 10v10h14V10M9 20v-6h6v6" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-semibold text-slate-900">Basic Information</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Update your platform's name, primary links, and contact details.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 p-5 sm:grid-cols-2 sm:p-7">
                
                
                {{-- Platform Logo --}}
                <div>
                    <label for="site_logo" class="mb-2 block text-sm font-medium text-slate-700">
                        Platform Logo <span class="text-red-500">*</span>
                    </label>

                    <input
                        id="site_logo"
                        name="site_logo"
                        type="file"
                        accept="image/png,image/jpeg,image/webp,image/svg+xml"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50"
                    >

                    @error('site_logo')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror

                    <p class="mt-1 text-xs text-slate-500">
                        Upload your platform logo (PNG, JPG, WEBP, or SVG).
                    </p>
                </div>

                {{-- Platform Name --}}
                <div>
                    <label for="site_name" class="mb-2 block text-sm font-medium text-slate-700">
                        Platform Name <span class="text-red-500">*</span>
                    </label>
                    <input id="site_name" name="site_name" type="text" value="{{ old('site_name', 'Mahasasto Shop') }}" placeholder="Enter platform name"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('site_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Social URL (Link) --}}
                <div>
                    <label for="site_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Facebook Link <span class="text-red-500">*</span>
                    </label>
                    <input id="facebook_url" name="facebook_url" type="url" value="{{ old('site_url') }}" placeholder="https://example.com"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('facebook_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="whatsapp_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Whatsapp Link <span class="text-red-500">*</span>
                    </label>
                    <input id="whatsapp_url" name="whatsapp_url" type="url" value="{{ old('site_url') }}" placeholder="https://example.com"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('whatsapp_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="site_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Instagram Link <span class="text-red-500">*</span>
                    </label>
                    <input id="instagram_url" name="instagram_url" type="url" value="{{ old('instagram_url') }}" placeholder="https://example.com"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('instagram_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Email --}}
                <div>
                    <label for="store_email" class="mb-2 block text-sm font-medium text-slate-700">
                        Contact Email <span class="text-red-500">*</span>
                    </label>
                    <input id="store_email" name="store_email" type="email" value="{{ old('store_email') }}" placeholder="support@example.com"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('store_email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Phone --}}
                <div>
                    <label for="store_phone" class="mb-2 block text-sm font-medium text-slate-700">
                        Contact Phone
                    </label>
                    <input id="store_phone" name="store_phone" type="tel" value="{{ old('store_phone') }}" placeholder="+977 98XXXXXXXX"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                </div>

                {{-- Store Address --}}
                <div class="sm:col-span-2">
                    <label for="store_address" class="mb-2 block text-sm font-medium text-slate-700">
                        Physical Address
                    </label>
                    <textarea id="store_address" name="store_address" rows="3" placeholder="Enter your business address"
                        class="w-full resize-y rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">{{ old('store_address') }}</textarea>
                </div>

            </div>
        </section>

        


        {{-- Form Actions --}}
        <div class="sticky bottom-0 z-10 flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white/95 p-4 shadow-lg backdrop-blur sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <p class="text-xs text-slate-500">
                Review your changes before saving.
            </p>

            <div class="flex flex-col-reverse gap-3 sm:flex-row">
                <a href="{{ url('/super-admin/dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
                    </svg>
                    Save
                </button>
            </div>
        </div>

    </form>
</div>