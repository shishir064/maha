
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-6 sm:px-6 lg:px-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Category Featured Sections
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage featured category sections displayed on your homepage.
            </p>
        </div>

        {{-- <a href="{{ route('admin.categoryfeatured.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-cyan-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-cyan-700">
            <i class="fas fa-plus"></i>
            Add Featured Category
        </a> --}}
    </div>

    {{-- Statistics --}}
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Sections</p>
                    <h2 class="mt-2 text-2xl font-bold text-slate-800">
                        {{ $categoryfeatureds->count() }}
                    </h2>
                </div>
                <div class="rounded-lg bg-blue-50 p-3 text-blue-600">
                    <i class="fas fa-layer-group text-xl"></i>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Active Sections</p>
                    <h2 class="mt-2 text-2xl font-bold text-green-600">
                        {{ $categoryfeatureds->where('status', true)->count() }}
                    </h2>
                </div>
                <div class="rounded-lg bg-green-50 p-3 text-green-600">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Inactive Sections</p>
                    <h2 class="mt-2 text-2xl font-bold text-red-600">
                        {{ $categoryfeatureds->where('status', false)->count() }}
                    </h2>
                </div>
                <div class="rounded-lg bg-red-50 p-3 text-red-600">
                    <i class="fas fa-pause-circle text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Table --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="font-semibold text-slate-800">
                Featured Category List
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[750px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-4">S.N.</th>
                        <th class="px-6 py-4">Section Title</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Product Limit</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Created Date</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($categoryfeatureds as $featured)
                        <tr class="transition hover:bg-slate-50">

                            <td class="px-6 py-4 font-medium text-slate-600">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-slate-800">
                                {{ $featured->title }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $featured->category->name ?? 'Category deleted' }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="rounded-lg bg-blue-50 px-3 py-1 font-semibold text-blue-700">
                                    {{ $featured->product_limit }} Products
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                @if($featured->status)
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>
                                @else
                                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-slate-500">
                                {{ $featured->created_at->format('d M, Y') }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.categoryfeatured.edit', $featured->id) }}"
                                       class="rounded-lg bg-green-50 px-3 py-2 text-green-600 transition hover:bg-green-100"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.categoryfeatured.destroy', $featured->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this featured category?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-red-600 transition hover:bg-red-100"
                                                title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-layer-group mb-3 text-4xl text-slate-300"></i>
                                    <h3 class="font-semibold text-slate-700">
                                        No Featured Categories Found
                                    </h3>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Add a featured category section to display products on your homepage.
                                    </p>
                                     <a href="{{ route('admin.categoryfeatured.create') }}"
                                   class="mt-4 inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                                    Add Featured Section
                                </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
