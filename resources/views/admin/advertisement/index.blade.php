@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500">Marketing / Advertisements</p>
                <h1 class="mt-1 text-2xl font-bold text-slate-800">
                    Advertisement Banners
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Manage banner images, links, positions, and display schedules.
                </p>
            </div>

            <a href="{{ route('admin.advertisement.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2.5
                      text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                <i class="fa-solid fa-plus"></i>
                Add Advertisement
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-5 rounded-lg border border-green-200 bg-green-50
                        px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- Advertisement Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[1200px] table-fixed text-left text-sm">

                    <thead class="bg-slate-100 text-xs uppercase tracking-wider text-slate-600">
                        <tr>
                            <th class="w-16 px-4 py-4">SN</th>
                           
                            <th class="w-44 px-4 py-4">Banner Image</th>
                            <th class="w-40 px-4 py-4">Position</th>
                            <th class="w-32 px-4 py-4">Link Type</th>
                            <th class="w-36 px-4 py-4">Link ID</th>
                            <th class="w-40 px-4 py-4">Schedule</th>
                            <th class="w-28 px-4 py-4">Status</th>
                            <th class="w-32 px-4 py-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        @forelse ($advertisements as $advertisement)
                            <tr class="transition hover:bg-slate-50">

                                {{-- Serial Number --}}
                                <td class="px-4 py-4 font-medium text-slate-500">
                                    {{ $advertisements->firstItem() + $loop->index }}
                                </td>

                               

                                {{-- Banner Image --}}
                                <td class="px-4 py-4">
                                    @if ($advertisement->image)
                                        <a href="{{ asset('storage/' . $advertisement->image) }}"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            <img
                                                src="{{ asset('storage/' . $advertisement->image) }}"
                                                alt="Advertisement banner"
                                                class="h-16 w-32 rounded-lg border border-slate-200
                                                       object-cover"
                                            >
                                        </a>
                                    @else
                                        <div class="flex h-16 w-32 items-center justify-center
                                                    rounded-lg bg-slate-100 text-xs text-slate-400">
                                            No image
                                        </div>
                                    @endif
                                </td>

                                {{-- Position --}}
                                <td class="px-4 py-4">
                                    <span class="inline-block max-w-full rounded-md bg-indigo-50
                                                 px-2.5 py-1.5 text-xs font-semibold
                                                 text-indigo-700">
                                        {{ ucwords(str_replace('_', ' ', $advertisement->position)) }}
                                    </span>
                                </td>

                                {{-- Link Type --}}
                                <td class="px-4 py-4">
                                    <span class="font-medium text-slate-700">
                                        {{ ucfirst($advertisement->link_type) }}
                                    </span>
                                </td>

                                {{-- Link ID --}}
                                <td class="px-4 py-4">
                                    @if ($advertisement->link_type === 'none')
                                        <span class="text-slate-400">No link</span>
                                    @elseif ($advertisement->link_id)
                                        <span class="rounded-md bg-slate-100 px-2 py-1
                                                     text-xs font-medium text-slate-700">
                                            #{{ $advertisement->link_id }}
                                        </span>
                                    @else
                                        <span class="text-slate-400">Not assigned</span>
                                    @endif
                                </td>

                                {{-- Schedule --}}
                                <td class="px-4 py-4">
                                    <div class="space-y-1 text-xs">
                                        <p>
                                            <span class="font-semibold text-slate-500">From:</span>
                                            {{ $advertisement->start_at
                                                ? \Carbon\Carbon::parse($advertisement->start_at)->format('M d, Y H:i')
                                                : 'Any time' }}
                                        </p>
                                        <p>
                                            <span class="font-semibold text-slate-500">To:</span>
                                            {{ $advertisement->end_at
                                                ? \Carbon\Carbon::parse($advertisement->end_at)->format('M d, Y H:i')
                                                : 'No end date' }}
                                        </p>
                                    </div>
                                </td>

                                {{-- Status --}}
                                <td class="px-4 py-4">
                                    @if ($advertisement->status)
                                        <span class="inline-flex items-center gap-1.5 rounded-full
                                                     bg-green-100 px-2.5 py-1 text-xs
                                                     font-semibold text-green-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full
                                                     bg-red-100 px-2.5 py-1 text-xs
                                                     font-semibold text-red-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-4">
                                    <div class="flex items-center justify-center gap-2">

                                        <a href="{{ route('admin.advertisement.edit', $advertisement->id) }}"
                                           title="Edit advertisement"
                                           class="inline-flex h-9 w-9 items-center justify-center
                                                  rounded-lg bg-green-100 text-green-700
                                                  transition hover:bg-green-200">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.advertisement.destroy', $advertisement->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this advertisement?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                title="Delete advertisement"
                                                class="inline-flex h-9 w-9 items-center justify-center
                                                       rounded-lg bg-red-100 text-red-700
                                                       transition hover:bg-red-200"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="mb-3 flex h-14 w-14 items-center justify-center
                                                    rounded-full bg-slate-100 text-slate-400">
                                            <i class="fa-solid fa-rectangle-ad text-2xl"></i>
                                        </div>
                                        <h3 class="font-semibold text-slate-800">
                                            No advertisements found
                                        </h3>
                                        <p class="mt-1 text-sm text-slate-500">
                                            Create your first advertisement banner to get started.
                                        </p>
                                        <a href="{{ route('admin.advertisement.create') }}"
                                           class="mt-4 rounded-lg bg-teal-600 px-4 py-2
                                                  text-sm font-semibold text-white hover:bg-teal-700">
                                            Add Advertisement
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{-- Pagination --}}
            @if ($advertisements->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">
                    {{ $advertisements->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection