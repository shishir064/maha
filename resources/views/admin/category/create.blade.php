@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-slate-50 p-4 sm:p-6">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <div class="mb-2 text-sm text-slate-500">
                Categories <span class="mx-2">/</span>
                <span class="text-slate-800">Create</span>
            </div>

            <h1 class="text-2xl font-bold text-slate-800">
                Create Category
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Add a new category to organize your products.
            </p>
        </div>

        <a href="{{route('admin.category.index')}}"
           class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100">
            <i class="fa-solid fa-arrow-left mr-2"></i>
            Back
        </a>
    </div>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    {{-- Form --}}
    <form action="{{route('admin.category.store')}}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3">

            {{-- Main Form --}}
            <div class="space-y-6 rounded-xl border border-slate-200 bg-white p-5 sm:p-6 lg:col-span-2">

                <div class="border-b border-slate-100 pb-4">
                    <h2 class="font-semibold text-slate-800">
                        <i class="fa-solid fa-layer-group mr-2 text-teal-600"></i>
                        Basic Information
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Enter the category details below.
                    </p>
                </div>

                {{-- Name and Slug --}}
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-slate-700">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Pants"
                               required
                               class="w-full rounded-lg border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div>
                        <label for="slug" class="mb-2 block text-sm font-medium text-slate-700">
                            Slug <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               placeholder="e.g. pants"
                               required
                               class="w-full rounded-lg border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                        @error('slug')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div> --}}
                </div>
                {{-- Description --}}
                <div>
                    <label for="description" class="mb-2 block text-sm font-medium text-slate-700">
                        Description
                    </label>
                    <textarea name="description"
                              id="description"
                              rows="4"
                              placeholder="Write a short description..."
                              class="w-full rounded-lg border border-slate-200 px-3.5 py-3 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">{{ old('description') }}</textarea>
                </div>

                {{-- Status and Sort Order --}}
                <div class="grid grid-cols-1 gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">
                    <div>
                        <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                            Status
                        </label>
                        <select name="status"
                                id="status"
                                class="w-full rounded-lg border border-slate-200 bg-white px-3.5 py-2.5 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                            <option value="1" @selected(old('status', '1') == '1')>Active</option>
                            <option value="0" @selected(old('status') === '0')>Inactive</option>
                        </select>
                    </div>

                    <div>
                        <label for="sort_order" class="mb-2 block text-sm font-medium text-slate-700">
                            Sort Order
                        </label>
                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               min="0"
                               value="{{ old('sort_order', 0) }}"
                               class="w-full rounded-lg border border-slate-200 px-3.5 py-2.5 text-sm outline-none focus:border-teal-500 focus:ring-2 focus:ring-teal-100">
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-5">
                    <a href=""
                       class="rounded-lg border border-slate-200 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-teal-700 focus:ring-4 focus:ring-teal-100">
                        <i class="fa-solid fa-check mr-2"></i>
                        Save Category
                    </button>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">

                {{-- Image Upload --}}
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <h2 class="mb-1 font-semibold text-slate-800">
                        Category Image
                    </h2>
                    <p class="mb-4 text-sm text-slate-500">
                        Upload an image for your category.
                    </p>

                    <label for="image"
                           class="flex cursor-pointer flex-col items-center rounded-lg border-2 border-dashed border-slate-200 px-4 py-8 text-center transition hover:border-teal-400 hover:bg-teal-50/30">
                        <i class="fa-solid fa-cloud-arrow-up mb-3 text-3xl text-teal-600"></i>
                        <span class="text-sm font-medium text-slate-700">
                            Click to upload
                        </span>
                        <span class="mt-1 text-xs text-slate-400">
                            PNG, JPG or WEBP
                        </span>
                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/png,image/jpeg,image/webp"
                               class="sr-only">
                    </label>

                    @error('image')
                        <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Helpful Information --}}
                <div class="rounded-xl border border-slate-200 bg-white p-5">
                    <h2 class="mb-4 font-semibold text-slate-800">
                        <i class="fa-solid fa-lightbulb mr-2 text-amber-500"></i>
                        Helpful Tips
                    </h2>

                    <ul class="space-y-3 text-sm leading-5 text-slate-500">
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-teal-600"></i>
                            Use clear and unique category names.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-teal-600"></i>
                            Keep slugs short and URL-friendly.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-teal-600"></i>
                            Use parent categories to organize subcategories.
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection