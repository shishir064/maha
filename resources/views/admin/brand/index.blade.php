@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-100 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <div class="mb-2 text-sm text-slate-500">
                    Catalog <span class="mx-2">/</span>
                    <span class="font-medium text-teal-700"></span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    brands
                </h1>
                <p class="mt-1 text-sm text-slate-600">
                    Manage and organize your product brands.
                </p>
            </div>

            <a href="{{ route('admin.brand.create') }}"
               class="inline-flex items-center rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800 hover:shadow-md">
                <i class="fa-solid fa-plus mr-2"></i>
                Add brands
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-5 flex items-center gap-3 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                <i class="fa-solid fa-circle-check text-lg text-emerald-600"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Search and Filter --}}
        <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <form action="{{ route('admin.brand.index') }}"
                  method="GET"
                  class="flex flex-col gap-3 sm:flex-row">

                <div class="relative flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-500"></i>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search brands by name or slug..."
                           class="w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-teal-600 focus:ring-2 focus:ring-teal-100">
                </div>

                <select name="status"
                        class="rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-100">
                    <option value="">All Status</option>
                    <option value="1" @selected(request('status') === '1')>Active</option>
                    <option value="0" @selected(request('status') === '0')>Inactive</option>
                </select>

                <button type="submit"
                        class="rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-900">
                    <i class="fa-solid fa-filter mr-2"></i>
                    Filter
                </button>

                @if (request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.brand.index') }}"
                       class="rounded-lg border border-slate-300 px-4 py-2.5 text-center text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                        <i class="fa-solid fa-rotate-left mr-1"></i>
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- brands Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-5 py-4">
                <div>
                    <h2 class="font-bold text-slate-900">
                        <i class="fa-solid fa-layer-group mr-2 text-teal-700"></i>
                        All brands
                    </h2>
                    <p class="mt-1 text-xs text-slate-500">
                        {{ $brands->total() }} brands found
                    </p>
                </div>

                <span class="rounded-lg border border-teal-200 bg-teal-50 px-3 py-1.5 text-xs font-semibold text-teal-800">
                    brand Management
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">

                    {{-- Table Header --}}
                    <thead class="border-b border-slate-300 bg-slate-200 text-xs uppercase tracking-wide text-slate-700">
                        <tr>
                            <th class="px-5 py-3.5 font-bold">sn</th>
                            <th class="px-5 py-3.5 font-bold">brand</th>
                            <th class="px-5 py-3.5 font-bold">Slug</th>
                            <th class="px-5 py-3.5 font-bold">Status</th>
                            <th class="px-5 py-3.5 text-center font-bold">Order</th>
                            <th class="px-5 py-3.5 font-bold">Created</th>
                            <th class="px-5 py-3.5 text-right font-bold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($brands as $brand)
                            <tr class="transition-colors duration-150 hover:bg-teal-50/70">
<td class="px-5 py-4">
                                    {{ $loop->iteration }}
                                </td>
                                {{-- Image and Name --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        @if ($brand->image)
                                            <img src="{{ asset('storage/' . $brand->image) }}"
                                                 alt="{{ $brand->name }}"
                                                 class="h-11 w-11 rounded-lg border border-slate-200 object-cover shadow-sm">
                                        @else
                                            <div class="flex h-11 w-11 items-center justify-center rounded-lg border border-teal-200 bg-teal-100 text-teal-800">
                                                <i class="fa-solid fa-layer-group text-lg"></i>
                                            </div>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="font-bold text-slate-900">
                                                {{ $brand->name }}
                                            </p>
                                            <p class="mt-1 max-w-xs truncate text-xs text-slate-500">
                                                {{ $brand->description ?: 'No description' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Slug --}}
                                <td class="px-5 py-4">
                                    <span class="inline-block rounded-md border border-slate-300 bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">
                                        {{ $brand->slug }}
                                    </span>
                                </td>

                                {{-- Status --}}
                                <td class="px-5 py-4">
                                    @if ($brand->status)
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-green-300 bg-green-100 px-2.5 py-1 text-xs font-bold text-green-800">
                                            <span class="h-2 w-2 rounded-full bg-green-600"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-300 bg-slate-200 px-2.5 py-1 text-xs font-bold text-slate-700">
                                            <span class="h-2 w-2 rounded-full bg-slate-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Sort Order --}}
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-md border border-slate-300 bg-slate-100 px-2 text-xs font-bold text-slate-800">
                                        {{ $brand->sort_order }}
                                    </span>
                                </td>

                                {{-- Created Date --}}
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-600">
                                    {{ $brand->created_at->format('M d, Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- View --}}
                                        <a href=""
                                           title="View category"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-blue-200 bg-blue-100 text-blue-800 transition hover:border-blue-400 hover:bg-blue-600 hover:text-white">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                           title="Edit category"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-green-200 bg-green-100 text-green-800 transition hover:border-green-600 hover:bg-green-600 hover:text-white">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.brand.destroy', $brand) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this brand?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete category"
                                                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 bg-red-100 text-red-700 transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-14 text-center">
                                    <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl border border-teal-200 bg-teal-50 text-teal-700">
                                        <i class="fa-solid fa-folder-open text-2xl"></i>
                                    </div>

                                    <p class="font-bold text-slate-800">
                                        No brands found
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Add a brand or adjust your search filters.
                                    </p>

                                    <a href="{{ route('admin.category.create') }}"
                                       class="mt-4 inline-flex items-center rounded-lg bg-teal-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800">
                                        <i class="fa-solid fa-plus mr-2"></i>
                                        Create brand
                                    </a>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($brands->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4">
                    {{ $brands->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
