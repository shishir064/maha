@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-100 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <div class="mb-2 text-sm text-slate-500">
                    Catalog <span class="mx-2">/</span>
                    <span class="font-medium text-teal-700">Categories</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Categories
                </h1>

                <p class="mt-1 text-sm text-slate-600">
                    Manage and organize your product categories.
                </p>
            </div>

            <a href="{{ route('admin.category.create') }}"
               class="inline-flex items-center rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor"
                     class="mr-2 h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Add Category
            </a>
        </div>

        {{-- Search and Filter --}}
        <div class="mb-5 rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <form action="{{ route('admin.category.index') }}"
                  method="GET"
                  class="flex flex-col gap-3 sm:flex-row">

                <div class="relative flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-500">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m20 20-4-4"/>
                    </svg>

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search categories by name or slug..."
                           class="w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-teal-600 focus:ring-2 focus:ring-teal-100">
                </div>

                <select name="status"
                        class="rounded-lg border border-slate-300 bg-white  text-sm text-slate-700 outline-none focus:border-teal-600 focus:ring-2 focus:ring-teal-100">
                    <option value="">All Status</option>
                    <option value="1" @selected(request('status') === '1')>
                        Active
                    </option>
                    <option value="0" @selected(request('status') === '0')>
                        Inactive
                    </option>
                </select>

                <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-slate-800 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-900">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor"
                         class="mr-2 h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 4.5h18l-7 8.25v5.25l-4 2v-7.25L3 4.5Z"/>
                    </svg>
                    Filter
                </button>

                @if (request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.category.index') }}"
                       class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-center text-sm font-medium text-slate-600 transition hover:bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor"
                             class="mr-1 h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M4.5 9A7.5 7.5 0 0 1 17 5l2 2m0-4v4h-4M19.5 15A7.5 7.5 0 0 1 7 19l-2-2m0 4v-4h4"/>
                        </svg>
                        Reset
                    </a>
                @endif
            </form>
        </div>

        {{-- Categories Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            {{-- Table Heading --}}
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-5 py-4">
                <div>
                    <h2 class="flex items-center font-bold text-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24"
                             stroke-width="1.8" stroke="currentColor"
                             class="mr-2 h-5 w-5 text-teal-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5m-16.5 5.25h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        All Categories
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        {{ $categories->total() }}
                        {{ $categories->total() === 1 ? 'category' : 'categories' }} found
                    </p>
                </div>

                <span class="rounded-lg border border-teal-200 bg-teal-50 px-3 py-1.5 text-xs font-semibold text-teal-800">
                    Category Management
                </span>
            </div>

            {{-- Responsive Table --}}
            <div class="overflow-x-auto">
                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="border-b border-slate-300 bg-slate-200 text-xs uppercase tracking-wide text-slate-700">
                        <tr>
                            <th scope="col" class="px-5 py-3.5 font-bold">SN</th>
                            <th scope="col" class="px-5 py-3.5 font-bold">Category</th>
                            <th scope="col" class="px-5 py-3.5 font-bold">Slug</th>
                            <th scope="col" class="px-5 py-3.5 font-bold">Status</th>
                            <th scope="col" class="px-5 py-3.5 text-center font-bold">Order</th>
                            <th scope="col" class="px-5 py-3.5 font-bold">Created</th>
                            <th scope="col" class="px-5 py-3.5 text-right font-bold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        @forelse ($categories as $category)
                            <tr class="transition-colors duration-150 hover:bg-teal-50/70">

                                {{-- Serial Number --}}
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-600">
                                    {{ $categories->firstItem() + $loop->index }}
                                </td>

                                {{-- Category Image and Name --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        @if ($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                 alt="{{ $category->name }}"
                                                 loading="lazy"
                                                 class="h-11 w-11 shrink-0 rounded-lg border border-slate-200 object-cover shadow-sm">
                                        @else
                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg border border-teal-200 bg-teal-100 text-teal-800">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.8" stroke="currentColor"
                                                     class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M4.5 5.25h6v6h-6v-6Zm9 0h6v6h-6v-6Zm-9 9h6v6h-6v-6Zm9 0h6v6h-6v-6Z"/>
                                                </svg>
                                            </div>
                                        @endif

                                        <div class="min-w-0">
                                            <p class="font-bold text-slate-900">
                                                {{ $category->name }}
                                            </p>

                                            <p class="mt-1 max-w-xs truncate text-xs text-slate-500">
                                                {{ $category->description ?: 'No description' }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Slug --}}
                                <td class="px-5 py-4">
                                    <span class="inline-block rounded-md border border-slate-300 bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-700">
                                        {{ $category->slug }}
                                    </span>
                                </td>

                                {{-- Status --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    @if ($category->status)
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
                                        {{ $category->sort_order ?? 0 }}
                                    </span>
                                </td>

                                {{-- Created Date --}}
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-slate-600">
                                    {{ $category->created_at?->format('M d, Y') ?? 'N/A' }}
                                </td>

                                {{-- Actions --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                        {{-- View --}}
                                        <a href="{{ route('admin.category.index', $category) }}"
                                           title="View category"
                                           aria-label="View {{ $category->name }}"
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

                                        {{-- Edit --}}
                                        <a href="{{ route('admin.category.edit', $category) }}"
                                           title="Edit category"
                                           aria-label="Edit {{ $category->name }}"
                                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-green-200 bg-green-100 text-green-800 transition hover:border-green-600 hover:bg-green-600 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.8" stroke="currentColor"
                                                 class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m16.862 4.487 2.651 2.651M4.5 19.5l4.5-1 10.513-10.513a1.875 1.875 0 0 0-2.652-2.652L6.348 15.848l-1.848 3.652Z"/>
                                            </svg>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.category.destroy', $category) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this category?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    title="Delete category"
                                                    aria-label="Delete {{ $category->name }}"
                                                    class="flex h-9 w-9 items-center justify-center rounded-lg border border-red-200 bg-red-100 text-red-700 transition hover:border-red-600 hover:bg-red-600 hover:text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.8" stroke="currentColor"
                                                     class="h-5 w-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="m14.74 9-.346 9m-5.788 0L8.26 9m9.968-3.21c.342.052.682.108 1.022.166m-1.022-.166L17.16 19.673a2.25 2.25 0 0 1-2.247 2.077H9.087a2.25 2.25 0 0 1-2.247-2.077L5.75 5.79m12.478 0a48.11 48.11 0 0 0-3.478-.397m-9 .563c.34-.058.68-.114 1.022-.166m0 0a48.11 48.11 0 0 1 3.478-.397m7.478 0V4.5c0-1.036-.84-1.875-1.875-1.875h-3.75C10.567 2.625 9.727 3.464 9.727 4.5v.897m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                {{-- 7 columns in the table --}}
                                <td colspan="7" class="px-5 py-14 text-center">
                                    <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-xl border border-teal-200 bg-teal-50 text-teal-700">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.8" stroke="currentColor"
                                             class="h-7 w-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M3.75 6.75h16.5v12.5H3.75V6.75Zm0 0 4.5 4.5 3-3 5.25 5.25"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M8.25 3.75h7.5"/>
                                        </svg>
                                    </div>

                                    <p class="font-bold text-slate-800">
                                        No categories found
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Add a category or adjust your search filters.
                                    </p>

                                    <a href="{{ route('admin.category.create') }}"
                                       class="mt-4 inline-flex items-center rounded-lg bg-teal-700 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="2" stroke="currentColor"
                                             class="mr-2 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 4.5v15m7.5-7.5h-15"/>
                                        </svg>
                                        Create Category
                                    </a>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($categories->hasPages())
                <div class="border-t border-slate-200 bg-slate-50 px-5 py-4">
                    {{ $categories->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
