
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6">

    <div class="mx-auto max-w-4xl">

        {{-- Page Header --}}
        <div class="mb-7">
            <div class="mb-3 flex items-center gap-2 text-sm font-medium text-cyan-600">
                <i class="fas fa-layer-group"></i>
                <span>Homepage Management</span>
                <i class="fas fa-chevron-right text-xs text-slate-400"></i>
                <span class="text-slate-500">Featured Categories</span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-800 sm:text-3xl">
                Featured category Section
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Create and manage category-based product sections displayed on your homepage.
            </p>
        </div>

        {{-- Main Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Card Header --}}
            <div class="flex items-center justify-between border-b border-slate-100 bg-gradient-to-r from-cyan-50 to-blue-50 px-6 py-5 sm:px-8">

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Homepage Featured Settings
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Configure your featured brand collection.
                    </p>
                </div>

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-cyan-600 shadow-sm">
                    <i class="fas fa-tags text-xl"></i>
                </div>

            </div>

            {{-- Form --}}
            <form action="{{ route('admin.categoryfeatured.store') }}" method="POST" class="p-6 sm:p-8">

                @csrf

                <div class="space-y-6">

                    {{-- Section Title --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Section Title
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <i class="fas fa-heading absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="e.g. Explore guchhi...."
                                class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50"
                            >
                        </div>

                        @error('title')
                            <p class="mt-1.5 text-xs font-medium text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Select Brand --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Select category
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <i class="fas fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <select
                                name="category_id"
                                class="w-full appearance-none rounded-xl border border-slate-200 bg-white py-3 pl-11 pr-10 text-sm text-slate-600 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50"
                            >
                                <option value="">Choose a category</option>
@foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category_id') == $category->id)>
                                        {{ $category->name }}
                                    </option>
@endforeach
                            </select>

                            <i class="fas fa-chevron-down pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-xs text-slate-400"></i>
                        </div>

                        @error('brand_id')
                            <p class="mt-1.5 text-xs font-medium text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Product Limit --}}
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">
                            Product Limit
                            <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <i class="fas fa-boxes-stacked absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input
                                type="number"
                                name="product_limit"
                                min="1"
                                value="{{ old('product_limit', 8) }}"
                                placeholder="8"
                                class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50"
                            >
                        </div>

                        <p class="mt-1.5 text-xs text-slate-400">
                            Number of products to display in this section.
                        </p>

                        @error('product_limit')
                            <p class="mt-1.5 text-xs font-medium text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="flex items-center justify-between gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:p-5">

                        <div class="flex items-start gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                                <i class="fas fa-toggle-on text-lg"></i>
                            </div>

                            <div>
                                <h4 class="text-sm font-semibold text-slate-800">
                                    Section Status
                                </h4>

                                <p class="mt-1 text-xs text-slate-500">
                                    Enable or disable this section on your homepage.
                                </p>
                            </div>
                        </div>

                        <label class="relative inline-flex shrink-0 cursor-pointer items-center">
                            <input
                                type="checkbox"
                                name="status"
                                value="1"
                                class="peer sr-only"
                                checked
                            >

                            <div class="h-6 w-11 rounded-full bg-slate-300 transition peer-checked:bg-emerald-500"></div>

                            <div class="absolute left-1 top-1 h-4 w-4 rounded-full bg-white shadow-sm transition peer-checked:translate-x-5"></div>
                        </label>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="mt-8 flex flex-col-reverse justify-between gap-4 border-t border-slate-100 pt-6 sm:flex-row sm:items-center">

                    <p class="text-xs text-slate-400">
                        <i class="fas fa-info-circle mr-1"></i>
                        Changes will be reflected on your homepage.
                    </p>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-cyan-600 to-blue-600 px-7 py-3 text-sm font-semibold text-white shadow-sm transition hover:from-cyan-700 hover:to-blue-700 hover:shadow-md"
                    >
                        <i class="fas fa-save"></i>
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
