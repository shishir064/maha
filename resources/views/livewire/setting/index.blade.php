<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ url('/super-admin/dashboard') }}" class="transition hover:text-indigo-600">
                    Super Admin
                </a>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                </svg>
                <span class="font-medium text-slate-700">Settings</span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                Platform Settings
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage your primary store details and contact information.
            </p>
        </div>

        <div class="flex items-center gap-3 self-start rounded-xl border border-indigo-100 bg-indigo-50 px-4 py-3 sm:self-auto">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-indigo-600">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Zm10-14V5a4 4 0 0 0-8 0v2" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-indigo-900">Super Admin</p>
                <p class="text-xs text-indigo-600">Global configuration</p>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="mb-2 font-semibold">Please check the following:</p>
            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Main Settings Form --}}
    <form action="#" method="POST" class="space-y-6">
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

                {{-- Website URL (Link) --}}
                <div>
                    <label for="site_url" class="mb-2 block text-sm font-medium text-slate-700">
                        Website Link <span class="text-red-500">*</span>
                    </label>
                    <input id="site_url" name="site_url" type="url" value="{{ old('site_url', url('/')) }}" placeholder="https://example.com"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50">
                    @error('site_url')
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
                    Save Settings
                </button>
            </div>
        </div>

    </form>
</div>