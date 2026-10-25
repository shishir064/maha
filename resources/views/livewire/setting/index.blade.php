<div class="mx-auto max-w-4xl space-y-6">

    {{-- Settings Form --}}
    <form action="{{ route('settings.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf

        {{-- Basic Information --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="flex items-start gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 10h18M5 10V6l1-3h12l1 3v4M5 10v10h14V10M9 20v-6h6v6" />
                    </svg>
                </div>

                <div>
                    <h2 class="text-base font-semibold text-slate-900">
                        Basic Information
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Update your platform name, social links, and contact details.
                    </p>
                </div>

            </div>

            <div class="grid grid-cols-1 gap-6 p-5 sm:grid-cols-2 sm:p-7">

                {{-- Platform Logo --}}
                <div>
                    <label for="site_logo" class="mb-2 block text-sm font-medium text-slate-700">
                        Platform Logo
                    </label>

                        @if (!empty($setting?->site_logo))
                            <div class="mb-3">
                                <p class="mb-2 text-xs text-slate-500">Current logo</p>

                                <img src="{{ asset('storage/' . $setting->site_logo) }}" alt="Platform Logo" ...>
                            </div>
                        @endif

                    <input id="site_logo"
                           name="site_logo"
                           type="file"
                           accept="image/png,image/jpeg,image/webp,image/svg+xml"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    <p class="mt-1 text-xs text-slate-500">
                        PNG, JPG, WEBP, or SVG. Leave empty to keep the current logo.
                    </p>

                    @error('site_logo')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Platform Name --}}
                <div>
                    <label for="site_name" class="mb-2 block text-sm font-medium text-slate-700">
                        Platform Name <span class="text-red-500">*</span>
                    </label>

                    <input id="site_name"
                           name="site_name"
                           type="text"
                           value="{{ old('site_name', $setting?->site_name) }}"
                           required
                           placeholder="Enter platform name"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('site_name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Facebook --}}
                <div>
                    <label for="facebook_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Facebook Link
                    </label>

                    <input id="facebook_url"
                           name="facebook_url"
                           type="url"
                           value="{{ old('facebook_url', $setting?->facebook_url) }}"
                           placeholder="https://facebook.com/yourpage"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('facebook_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- WhatsApp --}}
                <div>
                    <label for="whatsapp_url" class="mb-2 block text-sm font-medium text-slate-700">
                        WhatsApp Link
                    </label>

                    <input id="whatsapp_url"
                           name="whatsapp_url"
                           type="url"
                           value="{{ old('whatsapp_url', $setting?->whatsapp_url) }}"
                           placeholder="https://wa.me/97798XXXXXXXX"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('whatsapp_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Instagram --}}
                <div>
                    <label for="instagram_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Instagram Link
                    </label>

                    <input id="instagram_url"
                           name="instagram_url"
                           type="url"
                           value="{{ old('instagram_url', $setting?->instagram_url) }}"
                           placeholder="https://instagram.com/yourpage"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('instagram_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TikTok --}}
                <div>
                    <label for="tiktok_url" class="mb-2 block text-sm font-medium text-slate-700">
                        TikTok Link
                    </label>

                    <input id="tiktok_url"
                           name="tiktok_url"
                           type="url"
                           value="{{ old('tiktok_url', $setting?->tiktok_url) }}"
                           placeholder="https://tiktok.com/@yourpage"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('tiktok_url')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Email --}}
                <div>
                    <label for="store_email" class="mb-2 block text-sm font-medium text-slate-700">
                        Contact Email
                    </label>

                    <input id="store_email"
                           name="store_email"
                           type="email"
                           value="{{ old('store_email', $setting?->store_email) }}"
                           placeholder="support@example.com"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('store_email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Phone --}}
                <div>
                    <label for="store_phone" class="mb-2 block text-sm font-medium text-slate-700">
                        Contact Phone
                    </label>

                    <input id="store_phone"
                           name="store_phone"
                           type="tel"
                           value="{{ old('store_phone', $setting?->store_phone) }}"
                           placeholder="+977 98XXXXXXXX"
                           class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">

                    @error('store_phone')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Store Address --}}
                <div class="sm:col-span-2">
                    <label for="store_address" class="mb-2 block text-sm font-medium text-slate-700">
                        Physical Address
                    </label>

                    <textarea id="store_address"
                              name="store_address"
                              rows="3"
                              placeholder="Enter your business address"
                              class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">{{ old('store_address', $setting?->store_address) }}</textarea>

                    @error('store_address')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>
        </section>

        {{-- Settings Form Actions --}}
        <div class="flex flex-col gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:flex-row sm:items-center sm:justify-between sm:px-6">

            <p class="text-xs text-slate-500">
                Review your changes before saving.
            </p>

            <div class="flex flex-col-reverse gap-3 sm:flex-row">
                <a href="{{ url('/super-admin/dashboard') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Cancel
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m5 12 4 4L19 6" />
                    </svg>
                    Save Settings
                </button>
            </div>
        </div>

    </form>

    {{-- Maintenance Mode Section --}}
    @php
        $maintenanceEnabled = (bool) ($setting?->maintenance_mode ?? false);
    @endphp

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex items-start gap-4 border-b border-slate-100 px-5 py-5 sm:px-7">

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v3m0 4h.01M10.3 3.86 1.82 18.5A2 2 0 0 0 3.55 21h16.9a2 2 0 0 0 1.73-2.5L13.7 3.86a2 2 0 0 0-3.4 0Z" />
                </svg>
            </div>

            <div class="flex-1">
                <h2 class="text-base font-semibold text-slate-900">
                    Maintenance Mode
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Temporarily disable public access while you perform updates.
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-7">

            <div>
                <p class="font-medium text-slate-900">
                    {{ $maintenanceEnabled
                        ? 'Maintenance mode is currently ON'
                        : 'Maintenance mode is currently OFF' }}
                </p>

                <p class="mt-1 text-sm text-slate-500">
                    {{ $maintenanceEnabled
                        ? 'Public visitors should see the maintenance page.'
                        : 'Your store is accessible to public visitors.' }}
                </p>
            </div>

            {{-- Separate Toggle Form --}}
            <form action="{{ route('maintenance.toggle') }}"
                  method="POST"
                  class="shrink-0">

                @csrf

                <button type="submit"
                        onclick="return confirm('{{ $maintenanceEnabled ? 'Are you sure you want to disable maintenance mode?' : 'Are you sure you want to enable maintenance mode?' }}')"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-lg px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition focus:outline-none focus:ring-4 sm:w-auto
                            {{ $maintenanceEnabled
                                ? 'bg-red-600 hover:bg-red-700 focus:ring-red-100'
                                : 'bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-100' }}">

                    @if ($maintenanceEnabled)
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        Disable Maintenance
                    @else
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>
                        Enable Maintenance
                    @endif

                </button>
            </form>

        </div>
    </section>

</div>
