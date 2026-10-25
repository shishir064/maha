
<div class="mx-auto w-full space-y-6 p-4 sm:p-6">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.messages.index') }}"
           wire:navigate
           class="flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50">
            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m15 18-6-6 6-6" />
            </svg>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-800">View Message</h1>
            <p class="mt-1 text-sm text-slate-500">
                Read the full customer inquiry.
            </p>
        </div>
    </div>

    {{-- Message Details --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 bg-slate-50 px-5 py-5 sm:px-7">
            <span class="rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-700">
                {{ $message->subject }}
            </span>

            <h2 class="mt-3 text-xl font-bold text-slate-800">
                {{ $message->subject }}
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Received
                {{ $message->created_at?->format('F d, Y \a\t h:i A') ?? 'Date unavailable' }}
            </p>
        </div>

        <div class="space-y-6 p-5 sm:p-7">

            {{-- Sender Information --}}
            <div>
                <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-400">
                    Customer Information
                </h3>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs text-slate-500">Full Name</p>
                        <p class="mt-1 font-medium text-slate-800">
                            {{ $message->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Email Address</p>
                        <a href="mailto:{{ $message->email }}"
                           class="mt-1 inline-block break-all font-medium text-sky-600 hover:underline">
                            {{ $message->email }}
                        </a>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Phone Number</p>
                        <p class="mt-1 font-medium text-slate-800">
                            {{ $message->phone ?: 'Not provided' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Order Number</p>
                        <p class="mt-1 font-medium text-slate-800">
                            {{ $message->order_number ?: 'Not provided' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-100"></div>

            {{-- Full Message --}}
            <div>
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-slate-400">
                    Customer Message
                </h3>

                <div class="rounded-lg bg-slate-50 p-4 text-sm leading-7 text-slate-700 sm:p-5">
                    <p class="whitespace-pre-wrap break-words">{{ $message->message }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap justify-end gap-3 border-t border-slate-100 pt-5">
                <a href="{{ route('admin.messages.index') }}"
                   wire:navigate
                   class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                    Back to Messages
                </a>

                <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: ' . $message->subject) }}"
                   class="rounded-lg bg-sky-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-sky-700">
                    Reply by Email
                </a>
            </div>

        </div>
    </div>

</div>
