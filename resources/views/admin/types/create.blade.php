@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6">
            <p class="text-sm text-slate-500">Catalog / types</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-800">
                Create types of audiance
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Add a new type to organize your store products.
            </p>
        </div>

        <form action="{{ route('admin.types.store') }}" method="POST"
              class="mx-auto max-w-4xl space-y-6">
            @csrf

            {{-- Department Information --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

                <h2 class="mb-5 border-b border-slate-100 pb-3 text-lg font-semibold text-slate-800">
                    Department Information
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                    {{-- Department Name --}}
                    <div>
                        <label for="name" class="mb-1.5 block text-sm font-medium text-slate-700">
                            auduiance type Name <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="name" id="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Men, Women, Home & Bedding"
                               required maxlength="100"
                               class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('name') border-red-500 @else border-slate-300 @enderror">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label for="description" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Description <span class="text-slate-400">(Optional)</span>
                        </label>

                        <textarea name="description" id="description" rows="3"
                                  maxlength="1000"
                                  placeholder="Describe this department..."
                                  class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('description') border-red-500 @else border-slate-300 @enderror">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Display Order --}}
                   

                    {{-- Status --}}
                    <div>
                        <label for="status" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Status <span class="text-red-500">*</span>
                        </label>

                        <select name="status" id="status" required
                                class="w-full rounded-lg border bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none @error('status') border-red-500 @else border-slate-300 @enderror">

                            <option value="1" @selected(old('status', '1') == '1')>
                                Active
                            </option>

                            <option value="0" @selected(old('status', '1') == '0')>
                                Inactive
                            </option>
                        </select>

                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap items-center justify-end gap-3 pb-6">

                <a href=""
                   class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>

                <button type="submit"
                        class="rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    Create audiance type
                </button>

            </div>
        </form>
    </div>
@endsection
