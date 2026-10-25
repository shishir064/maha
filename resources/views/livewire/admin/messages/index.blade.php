
<div class="space-y-6 p-4 sm:p-6">

{{-- Breadcrumb --}}
<nav aria-label="Breadcrumb"
     class="flex flex-wrap items-center gap-2 text-sm">

    {{-- Dashboard --}}
    <a href="{{ route('dashboard') }}"
       wire:navigate
       class="inline-flex items-center gap-1.5 font-medium text-slate-500 transition hover:text-teal-700">

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24"
             stroke-width="1.8" stroke="currentColor"
             class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="m2.25 12 9.204-8.127a.75.75 0 0 1 .992 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h4.125v-5.625h4.5V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75"/>
        </svg>

        Dashboard
    </a>

    {{-- Separator --}}
    <svg xmlns="http://www.w3.org/2000/svg"
         fill="none" viewBox="0 0 24 24"
         stroke-width="1.8" stroke="currentColor"
         class="h-4 w-4 text-slate-400">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="m9 18 6-6-6-6"/>
    </svg>

    {{-- Current Page --}}
    <span aria-current="page"
          class="inline-flex items-center gap-1.5 font-semibold text-teal-700">

        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24"
             stroke-width="1.8" stroke="currentColor"
             class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75M21.75 6.75A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-8.19 5.46a2.81 2.81 0 0 1-3.12 0L2.25 6.75"/>
        </svg>

        Contact Messages
    </span>
</nav>


    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <div>
            <h1 class="flex items-center text-2xl font-bold text-slate-900">
                Contact Messages
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                View and manage messages submitted by customers.
            </p>
        </div>

        <span class="inline-flex w-fit items-center rounded-lg border border-teal-200 bg-teal-50 px-3 py-2 text-xs font-semibold text-teal-800">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor"
                 class="mr-2 h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3.75 6.75h16.5m-16.5 5.25h16.5m-16.5 5.25h16.5"/>
            </svg>
            Message Management
        </span>
    </div>
    {{-- Messages Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        {{-- Table Heading --}}
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-5 py-4">
            <div>
                <h2 class="flex items-center font-bold text-slate-900">
                    All Messages
                </h2>

                <p class="mt-1 text-xs text-slate-500">
                    {{ $messages->total() }}
                    {{ $messages->total() === 1 ? 'message' : 'messages' }} found
                </p>
            </div>

            <span class="rounded-lg border border-teal-200 bg-teal-50 px-3 py-1.5 text-xs font-semibold text-teal-800">
                Customer Inquiries
            </span>
        </div>

        {{-- Responsive Table --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="border-b border-slate-300 bg-slate-200 text-xs uppercase tracking-wide text-slate-700">
                    <tr>
                        <th scope="col" class="px-5 py-3.5 font-bold">SN</th>
                        <th scope="col" class="px-5 py-3.5 font-bold">Customer</th>
                        <th scope="col" class="px-5 py-3.5 font-bold">Subject</th>
                        <th scope="col" class="px-5 py-3.5 font-bold">Order Number</th>
                        <th scope="col" class="px-5 py-3.5 font-bold">Received</th>
                        <th scope="col" class="px-5 py-3.5 text-right font-bold">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse ($messages as $message)
                        <tr wire:key="contact-message-{{ $message->id }}"
                            class="transition-colors duration-150 hover:bg-teal-50/70">

                            {{-- Serial Number --}}
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-600">
                                {{ $messages->firstItem() + $loop->index }}
                            </td>

                            {{-- Customer --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg border border-teal-200 bg-teal-100 text-teal-800">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.8" stroke="currentColor"
                                             class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.25a7.5 7.5 0 0 1 15 0"/>
                                        </svg>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="font-bold text-slate-900">
                                            {{ $message->name }}
                                        </p>

                                        <a href="mailto:{{ $message->email }}"
                                           class="mt-1 block max-w-xs truncate text-xs text-slate-500 transition hover:text-teal-700">
                                            {{ $message->email }}
                                        </a>

                                        @if ($message->phone)
                                            <p class="mt-1 text-xs text-slate-500">
                                                {{ $message->phone }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Subject --}}
                            <td class="px-5 py-4">
                                <span class="inline-block max-w-[220px] rounded-md border border-slate-300 bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">
                                    {{ $message->subject }}
                                </span>
                            </td>

                            {{-- Order Number --}}
                            <td class="whitespace-nowrap px-5 py-4">
                                @if ($message->order_number)
                                    <span class="inline-flex items-center rounded-md border border-slate-300 bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">
                                        {{ $message->order_number }}
                                    </span>
                                @else
                                    <span class="text-slate-400">—</span>
                                @endif
                            </td>

                            {{-- Received Date --}}
                            <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-600">
                                {{ $message->created_at?->format('M d, Y') ?? 'N/A' }}
                            </td>

                            {{-- Actions --}}
                            <td class="whitespace-nowrap px-5 py-4">
                                <div class="flex items-center justify-end gap-2">

                                    {{-- View --}}
                                    <a href="{{ route('admin.messages.show', $message->id) }}"
                                       wire:navigate
                                       title="View message"
                                       aria-label="View message from {{ $message->name }}"
                                       class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 bg-blue-100 text-blue-800 transition hover:border-blue-400 hover:bg-blue-600 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.8" stroke="currentColor"
                                             class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.25 12s3.5-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.5 7.5-9.75 7.5S2.25 12 2.25 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>

                                    {{-- Reply by Email --}}
                                    <a href="mailto:{{ $message->email }}?subject={{ rawurlencode('Re: ' . $message->subject) }}"
                                       title="Reply by email"
                                       aria-label="Reply to {{ $message->name }}"
                                       class="flex h-9 w-9 items-center justify-center rounded-lg border border-green-200 bg-green-100 text-green-800 transition hover:border-green-600 hover:bg-green-600 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.8" stroke="currentColor"
                                             class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75M21.75 6.75A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-8.19 5.46a2.81 2.81 0 0 1-3.12 0L2.25 6.75"/>
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    <button type="button"
                                            wire:click="deleteMessage({{ $message->id }})"
                                            wire:confirm="Are you sure you want to delete this message?"
                                            title="Delete message"
                                            aria-label="Delete message from {{ $message->name }}"
                                            class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 bg-red-100 text-red-700 transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.8" stroke="currentColor"
                                             class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m14.74 9-.346 9m-5.788 0L8.26 9m9.968-3.21c.342.052.682.108 1.022.166m-1.022-.166L17.16 19.673a2.25 2.25 0 0 1-2.247 2.077H9.087a2.25 2.25 0 0 1-2.247-2.077L5.75 5.79m12.478 0a48.11 48.11 0 0 0-3.478-.397m-9 .563c.34-.058.68-.114 1.022-.166m0 0a48.11 48.11 0 0 1 3.478-.397m7.478 0V4.5c0-1.036-.84-1.875-1.875-1.875h-3.75C10.567 2.625 9.727 3.464 9.727 4.5v.897m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                        </svg>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-14 text-center">
                                <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl border border-teal-200 bg-teal-50 text-teal-700">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.8" stroke="currentColor"
                                         class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3.75 6.75h16.5m-16.5 5.25h16.5m-16.5 5.25h16.5"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4.5 3.75h15a2.25 2.25 0 0 1 2.25 2.25v12A2.25 2.25 0 0 1 19.5 20.25h-15A2.25 2.25 0 0 1 2.25 18V6A2.25 2.25 0 0 1 4.5 3.75Z"/>
                                    </svg>
                                </div>

                                <p class="font-bold text-slate-800">
                                    No messages found
                                </p>

                                <p class="mt-1 text-sm text-slate-500">
                                    Customer contact form submissions will appear here.
                                </p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($messages->hasPages())
            <div class="border-t border-slate-200 bg-slate-50 px-5 py-4">
                {{ $messages->withQueryString()->links() }}
            </div>
        @endif

    </div>
</div>
