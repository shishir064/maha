@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6 lg:p-8">
        <div class="mx-auto max-w-7xl space-y-6">

            {{-- Header --}}
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-medium text-teal-600">
                        Storefront / Slider Management
                    </p>
                    <h1 class="mt-1 text-2xl font-bold text-slate-800 sm:text-3xl">
                        Sliders Dashboard
                    </h1>
                    <p class="mt-2 text-sm text-slate-500">
                        Manage desktop and mobile banners displayed on your website.
                    </p>
                </div>

                <a href="{{ route('admin.sliders.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-teal-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 5v14m-7-7h14"/>
                    </svg>
                    Add New Slider
                </a>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Total Sliders</p>
                    <div class="mt-3 flex items-center justify-between">
                        <h2 class="text-3xl font-bold text-slate-800">
                            {{ $sliders->total() }}
                        </h2>
                        <div class="rounded-xl bg-teal-50 p-3 text-teal-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path stroke-linecap="round" d="M3 9h18"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Active Sliders</p>
                    <div class="mt-3 flex items-center justify-between">
                        <h2 class="text-3xl font-bold text-green-600">
                            {{ \App\Models\Slider::where('status', true)->count() }}
                        </h2>
                        <span class="rounded-xl bg-green-50 p-3 text-green-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 12l4 4L19 6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Inactive Sliders</p>
                    <div class="mt-3 flex items-center justify-between">
                        <h2 class="text-3xl font-bold text-red-600">
                            {{ \App\Models\Slider::where('status', false)->count() }}
                        </h2>
                        <span class="rounded-xl bg-red-50 p-3 text-red-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path stroke-linecap="round" d="M9 9l6 6m0-6l-6 6"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            {{-- Sliders Table --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="flex flex-col gap-2 border-b border-slate-200 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">
                            All Sliders
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            View banner images, scheduling and publication status.
                        </p>
                    </div>
                    <span class="text-sm text-slate-500">
                        {{ $sliders->firstItem() ?? 0 }}–{{ $sliders->lastItem() ?? 0 }}
                        of {{ $sliders->total() }} records
                    </span>
                </div>

                @if($sliders->isEmpty())
                    <div class="px-6 py-16 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path stroke-linecap="round" d="M3 9h18"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-base font-semibold text-slate-800">
                            No sliders found
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">
                            Create your first slider to display a banner on your website.
                        </p>
                        <a href="{{ route('admin.sliders.create') }}"
                           class="mt-5 inline-flex rounded-lg bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-teal-700">
                            Create Slider
                        </a>
                    </div>
                @else

    <table class="w-full min-w-[1100px] table-fixed text-left text-sm">

        {{-- Table Header --}}
        <thead class="border-b border-slate-200 bg-slate-50">
            <tr class="text-xs uppercase tracking-wider text-slate-500">
                <th class="w-16 px-4 py-4 text-center font-semibold">SN</th>
              
                <th class="w-40 px-3 py-4 font-semibold">Desktop Image</th>
                <th class="w-32 px-3 py-4 font-semibold">Mobile Image</th>
                <th class="w-48 px-3 py-4 font-semibold">Button Link</th>
                <th class="w-56 px-3 py-4 font-semibold">Schedule</th>
                <th class="w-28 px-3 py-4 text-center font-semibold">Status</th>
                <th class="w-44 px-4 py-4 text-center font-semibold">Actions</th>
            </tr>
        </thead>

        {{-- Table Body --}}
        <tbody class="divide-y divide-slate-100">
            @forelse($sliders as $slider)
                <tr class="transition-colors duration-200 hover:bg-teal-50/40">

                    {{-- Serial Number --}}
                    <td class="px-4 py-5 text-center">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 font-bold text-slate-600">
                            {{ $sliders->firstItem() + $loop->index }}
                        </span>
                    </td>

                    {{-- Slider ID --}}
                  

                    {{-- Desktop Image --}}
                    <td class="px-3 py-5">
                        <a href="{{ asset('storage/' . $slider->desktop_image) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group block w-32">
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100 p-1 transition group-hover:border-teal-400 group-hover:shadow-md">
                                <img
                                    src="{{ asset('storage/' . $slider->desktop_image) }}"
                                    alt="Desktop slider {{ $slider->id }}"
                                    class="h-16 w-full rounded-lg object-cover"
                                    loading="lazy">
                            </div>
                            <p class="mt-1.5 text-center text-[10px] font-medium text-slate-400">
                                DESKTOP
                            </p>
                        </a>
                    </td>

                    {{-- Mobile Image --}}
                    <td class="px-3 py-5">
                        <a href="{{ asset('storage/' . $slider->mobile_image) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="group flex w-20 flex-col items-center">
                            <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-100 p-1 transition group-hover:border-teal-400 group-hover:shadow-md">
                                <img
                                    src="{{ asset('storage/' . $slider->mobile_image) }}"
                                    alt="Mobile slider {{ $slider->id }}"
                                    class="h-16 w-12 rounded-lg object-cover"
                                    loading="lazy">
                            </div>
                            <p class="mt-1.5 text-[10px] font-medium text-slate-400">
                                MOBILE
                            </p>
                        </a>
                    </td>

                    {{-- Button Link --}}
                    <td class="px-3 py-5">
                        <a href="{{ $slider->button_link }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           title="{{ $slider->button_link }}"
                           class="group flex max-w-full items-center gap-2 rounded-lg border border-slate-200 bg-white px-2.5 py-2 text-teal-700 transition hover:border-teal-300 hover:bg-teal-50">
                            <svg class="h-4 w-4 shrink-0 text-teal-600"
                                 fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10 13a5 5 0 007.07 0l3-3a5 5 0 00-7.07-7.07l-1.72 1.71M14 11a5 5 0 00-7.07 0l-3 3a5 5 0 007.07 7.07l1.71-1.71"/>
                            </svg>
                            <span class="truncate text-xs font-medium">
                                {{ $slider->button_link }}
                            </span>
                        </a>
                    </td>

                    {{-- Schedule --}}
                    <td class="px-3 py-5">
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="mt-0.5 text-green-600">
                                    <svg class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="2">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round"
                                              d="M12 7v5l3 2"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">
                                        Starts
                                    </p>
                                    <p class="text-xs font-semibold text-slate-700">
                                        {{ \Carbon\Carbon::parse($slider->start_at)->format('M d, Y') }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        {{ \Carbon\Carbon::parse($slider->start_at)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-2">
                                <span class="mt-0.5 text-red-500">
                                    <svg class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="2">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path stroke-linecap="round"
                                              d="M12 7v5l3 2"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-[10px] font-semibold uppercase tracking-wide text-slate-400">
                                        Expires
                                    </p>
                                    <p class="text-xs font-semibold text-slate-700">
                                        {{ \Carbon\Carbon::parse($slider->end_at)->format('M d, Y') }}
                                    </p>
                                    <p class="text-xs text-slate-500">
                                        {{ \Carbon\Carbon::parse($slider->end_at)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- Status --}}
                    <td class="px-3 py-5 text-center">
                        @if($slider->status)
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-green-200 bg-green-50 px-2.5 py-1.5 text-xs font-semibold text-green-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full border border-red-200 bg-red-50 px-2.5 py-1.5 text-xs font-semibold text-red-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Inactive
                            </span>
                        @endif
                    </td>

                    {{-- Actions --}}
                    <td class="px-4 py-5">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                               title="Edit slider"
                               class="inline-flex items-center gap-1.5 rounded-lg bg-green-600 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-1">
                                <svg class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 4l4 4M4 20l4-1 11-11a2.12 2.12 0 00-3-3L5 16l-1 4z"/>
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        title="Delete slider"
                                        class="inline-flex items-center gap-1.5 rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-1">
                                    <svg class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 6h18M8 6V4h8v2m-9 2l1 12h8l1-12M10 11v5m4-5v5"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-16 text-center">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                           <svg xmlns="http://www.w3.org/2000/svg"
     class="h-7 w-7 text-teal-600"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor"
     stroke-width="1.8"
     aria-hidden="true">

    <path stroke-linecap="round"
          stroke-linejoin="round"
          d="M3 10.5L12 3l9 7.5M5 9v11h14V9M9 20v-6h6v6" />
</svg>
                                <rect x="3" y="4" width="18" height="16" rx="2"/>
                                <path stroke-linecap="round" d="M3 9h18"/>
                            </svg>
                        </div>
                        <p class="mt-4 font-semibold text-slate-800">
                            No sliders available
                        </p>
                        <p class="mt-1 text-sm text-slate-500">
                            Add a slider to get started.
                        </p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>


                    </div>

                    {{-- Pagination --}}
                    <div class="border-t border-slate-200 px-5 py-4 sm:px-6">
                        {{ $sliders->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
