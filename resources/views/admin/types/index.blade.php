@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500">Catalog / Audience Types</p>
                <h1 class="mt-1 text-2xl font-bold text-slate-800">
                    Audience Types
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Manage audience types for your store products.
                </p>
            </div>

            <a href="{{ route('admin.types.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                <i class="fa-solid fa-plus"></i>
                Add Audience Type
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                <i class="fa-solid fa-circle-check mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation / Error Message --}}
        @if (session('error'))
            <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        {{-- Search --}}
        <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <form action="{{ route('admin.types.index') }}" method="GET"
                  class="flex flex-wrap items-center gap-3">

                <div class="relative min-w-[220px] flex-1">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>

                    <input type="text" name="search"
                           value="{{ request('search') }}"
                           placeholder="Search audience types..."
                           class="w-full rounded-lg border border-slate-300 py-2.5 pl-9 pr-3 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100">
                </div>

                <select name="status"
                        class="rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none">
                    <option value="">All Status</option>
                    <option value="1" @selected(request('status') === '1')>Active</option>
                    <option value="0" @selected(request('status') === '0')>Inactive</option>
                </select>

                <button type="submit"
                        class="rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-700">
                    Search
                </button>

                <a href="{{ route('admin.types.index') }}"
                   class="rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    Reset
                </a>
            </form>
        </div>

        {{-- Audience Types Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-5 py-4">
                <h2 class="font-semibold text-slate-800">All Audience Types</h2>

                <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700">
                    {{ $types->total() }} Records
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th class="w-16 px-4 py-3 font-semibold">sn</th>
                            <th class="px-4 py-3 font-semibold">Audience Type</th>
                            <th class="px-4 py-3 font-semibold">Description</th>
                            <th class="w-28 px-4 py-3 text-center font-semibold">Status</th>
                            <th class="w-36 px-4 py-3 text-center font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($types as $type)
                            <tr class="transition hover:bg-slate-50">

                                <td class="px-4 py-3.5 text-slate-500">
                                    {{ $types->firstItem() + $loop->index }}
                                </td>

                                <td class="px-4 py-3.5">
                                    <div class="font-semibold text-slate-800">
                                        {{ $type->name }}
                                    </div>
                                </td>

                                <td class="max-w-xs px-4 py-3.5 text-slate-600">
                                    <p class="line-clamp-2">
                                        {{ $type->description ?: 'No description provided' }}
                                    </p>
                                </td>

                                <td class="px-4 py-3.5 text-center">
                                    @if ($type->status)
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3.5">
                                    <div class="flex items-center justify-center gap-2">

                                        <a href="{{ route('admin.types.edit', $type->id) }}"
                                           title="Edit"
                                           class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-600 transition hover:bg-green-100">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('admin.types.destroy', $type->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this audience type?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete"
                                                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-600 transition hover:bg-red-100">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-12 text-center">
                                    <div class="mb-2 text-3xl text-slate-300">
                                        <i class="fa-solid fa-layer-group"></i>
                                    </div>
                                    <p class="font-medium text-slate-700">
                                        No audience types found
                                    </p>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Add an audience type or change your search filters.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($types->hasPages())
                <div class="border-t border-slate-200 px-5 py-4">
                    {{ $types->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
