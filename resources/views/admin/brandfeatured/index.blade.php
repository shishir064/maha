 @extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 p-4 sm:p-6 lg:p-8">

    {{-- Page Header --}}
    <div class="mb-7 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-800">
                Brand Featured Sections
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage featured brand sections displayed on your storefront.
            </p>
        </div>

        {{-- <a href="{{ route('admin.brandfeatured.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>

            Add Featured Section
        </a> --}}
    </div>

    {{-- Statistics --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Sections</p>
                    <h3 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $brandfeatureds->count() }}
                    </h3>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6.75A2.75 2.75 0 0 1 6.75 4h10.5A2.75 2.75 0 0 1 20 6.75v10.5A2.75 2.75 0 0 1 17.25 20H6.75A2.75 2.75 0 0 1 4 17.25V6.75Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8 8h8M8 12h8M8 16h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Active Sections</p>
                    <h3 class="mt-2 text-2xl font-bold text-green-600">
                        {{ $brandfeatureds->where('status', true)->count() }}
                    </h3>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-green-50 text-green-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m5 12 4.5 4.5L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Inactive Sections</p>
                    <h3 class="mt-2 text-2xl font-bold text-red-500">
                        {{ $brandfeatureds->where('status', false)->count() }}
                    </h3>
                </div>
                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-red-50 text-red-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor"
                         stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 6l12 12M18 6 6 18"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- Table Card --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        {{-- Table Header --}}
        <div class="flex flex-col justify-between gap-3 border-b border-slate-100 p-5 sm:flex-row sm:items-center">
            <div>
                <h2 class="text-lg font-semibold text-slate-800">
                    All Featured Sections
                </h2>
                <p class="mt-1 text-xs text-slate-500">
                    View and manage your storefront brand sections.
                </p>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[850px] text-left">

                <thead class="bg-slate-50">
                    <tr class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Section Title</th>
                        <th class="px-6 py-4">Brand</th>
                        <th class="px-6 py-4">Product Limit</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Created At</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($brandfeatureds as $featured)

                        <tr class="transition hover:bg-slate-50/70">

                            {{-- ID --}}
                            <td class="px-6 py-4 text-sm font-medium text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            {{-- Title --}}
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-800">
                                    {{ $featured->title }}
                                </div>
                                <p class="mt-1 text-xs text-slate-400">
                                    ID: #{{ $featured->id }}
                                </p>
                            </td>

                            {{-- Brand --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center rounded-md bg-indigo-50 px-3 py-1.5 text-sm font-semibold text-indigo-700">
                                    {{ $featured->brand?->name ?? 'Brand deleted' }}
                                </span>
                            </td>

                            {{-- Product Limit --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-2 text-sm font-medium text-slate-700">
                                    <svg class="h-4 w-4 text-slate-400"
                                         fill="none" stroke="currentColor"
                                         stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9Z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m4.5 7.75 7.5 4.5 7.5-4.5M12 12.25V21"/>
                                    </svg>
                                    {{ $featured->product_limit }} Products
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4">
                                @if($featured->status)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-6 py-4 text-sm text-slate-500">
                                {{ $featured->created_at->format('d M, Y') }}
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.brandfeatured.edit', $featured->id) }}"
                                       title="Edit"
                                       class="rounded-lg bg-indigo-50 p-2 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">
                                        <svg class="h-4 w-4" fill="none"
                                             stroke="currentColor" stroke-width="2"
                                             viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m16.862 4.487 2.651 2.651M4 20l4.5-1 11.013-11.013a1.875 1.875 0 0 0-2.651-2.651L5.85 16.348 4 20Z"/>
                                        </svg>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.brandfeatured.destroy', $featured->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this featured section?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                title="Delete"
                                                class="rounded-lg bg-red-50 p-2 text-red-600 transition hover:bg-red-600 hover:text-white">
                                            <svg class="h-4 w-4" fill="none"
                                                 stroke="currentColor" stroke-width="2"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M6 7h12m-10 0V5h8v2m-9 0 1 13h8l1-13M10 11v5m4-5v5"/>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">
                                    <svg class="h-7 w-7 text-slate-400"
                                         fill="none" stroke="currentColor"
                                         stroke-width="1.6" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9Z"/>
                                    </svg>
                                </div>

                                <h3 class="mt-4 text-base font-semibold text-slate-800">
                                    No featured sections found
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    Create your first brand featured section.
                                </p>

                                <a href="{{ route('admin.brandfeatured.create') }}"
                                   class="mt-4 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                                    Add Featured Section
                                </a>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection