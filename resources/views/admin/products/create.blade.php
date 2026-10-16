@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6">
            <p class="text-sm text-slate-500">Catalog / Products</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-800">Create Product</h1>
            <p class="mt-1 text-sm text-slate-500">
                Add a new product to your inventory.
            </p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
            class="mx-auto max-w-6xl space-y-6">
            @csrf

            {{-- Basic Information --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="mb-5 border-b border-slate-100 pb-3 text-lg font-semibold text-slate-800">
                    Basic Information
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                    {{-- Product Name --}}
                    <div>
                        <label for="name" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Product Name <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            placeholder="Enter product name" required minlength="2" maxlength="255"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('name') border-red-500 @else border-slate-300 @enderror">

                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- SKU / Product Code --}}
                    <div>
                        <label for="sku" class="mb-1.5 block text-sm font-medium text-slate-700">
                            SKU / Product Code
                        </label>

                        <input type="text" name="sku" id="sku" value="{{ old('sku') }}"
                            placeholder="e.g. PROD-001" maxlength="100"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('sku') border-red-500 @else border-slate-300 @enderror">

                        @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label for="description" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Description<span class="text-red-500">*</span>
                        </label>

                        <textarea name="description" id="description" rows="3" maxlength="5000" placeholder="Describe the product..."
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('description') border-red-500 @else border-slate-300 @enderror">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Category <span class="text-red-500">*</span>
                        </label>


                        <select name="category_id" id="category_id" required
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none @error('category_id') border-red-500 @enderror">

                            <option value="">Select category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <label for="brand_id" class="mb-1.5 block text-sm font-medium text-slate-700">
                            brand <span class="text-red-500">*</span>
                        </label>

                        <select name="brand_id" id="brand_id" required
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none @error('brand_id') border-red-500 @enderror">

                            <option value="">Select brand</option>

                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('brand_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                            type of audiance <span class="text-red-500">*</span>
                        </label>

                        <select name="types_of_audiance[]" multiple required
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(in_array($type->id, old('types_of_audiance', [])))>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('type_of_audiance')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        @error('type_of_audiance.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <p class="mt-1 text-xs text-slate-500">
                            Hold Ctrl on Windows to select multiple departments.
                        </p>
                    </div>
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-slate-700">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select name="status" required
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none">
                            <option value="1" @selected(old('status', '1') == '1')>Available</option>
                            <option value="0" @selected(old('status') === '0')>Unavailable</option>
                        </select>
                    </div>

                </div>
            </div>


            {{-- Pricing --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="mb-5 border-b border-slate-100 pb-3 text-lg font-semibold text-slate-800">
                    Pricing Information
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                    {{-- Purchase Price --}}
                    <div>
                        <label for="purchase_price" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Purchase Price
                        </label>

                        <input type="number" name="purchase_price" id="purchase_price" value="{{ old('purchase_price') }}"
                            min="0" step="0.01" placeholder="0.00"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('purchase_price') border-red-500 @else border-slate-300 @enderror">

                        @error('purchase_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Selling Price --}}
                    <div>
                        <label for="price" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Selling Price <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="price" id="price" value="{{ old('price') }}" min="0"
                            step="0.01" placeholder="0.00" required
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('price') border-red-500 @else border-slate-300 @enderror">

                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Discount --}}
                    <div>
                        <label for="discount" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Discount (%)
                        </label>

                        <input type="number" name="discount" id="discount" value="{{ old('discount') }}"
                            min="0" max="100" step="0.01" placeholder="Optional"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('discount') border-red-500 @else border-slate-300 @enderror">

                        @error('discount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>



            {{-- Inventory --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="mb-5 border-b border-slate-100 pb-3 text-lg font-semibold text-slate-800">
                    Inventory & Shipping
                </h2>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                    {{-- Stock Quantity --}}
                    <div>
                        <label for="stock" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Stock Quantity <span class="text-red-500">*</span>
                        </label>

                        <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}"
                            min="0" step="1" required
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('stock') border-red-500 @else border-slate-300 @enderror">

                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Weight --}}
                    <div>
                        <label for="weight" class="mb-1.5 block text-sm font-medium text-slate-700">
                            Weight (kg)
                        </label>

                        <input type="number" name="weight" id="weight" value="{{ old('weight') }}" min="0"
                            step="0.01" placeholder="e.g. 0.50"
                            class="w-full rounded-lg border px-3 py-2.5 text-sm focus:border-teal-500 focus:outline-none focus:ring-2 focus:ring-teal-100 @error('weight') border-red-500 @else border-slate-300 @enderror">

                        @error('weight')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>


            {{-- Product Image --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="mb-5 border-b border-slate-100 pb-3 text-lg font-semibold text-slate-800">
                    Product Media
                </h2>

                <div>
                    <label for="image" class="mb-1.5 block text-sm font-medium text-slate-700">
                        Product Image
                    </label>

                    <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full rounded-lg border text-sm text-slate-600 file:mr-4 file:border-0 file:bg-teal-50 file:px-4 file:py-2.5 file:font-medium file:text-teal-700 hover:file:bg-teal-100 @error('image') border-red-500 @else border-slate-300 @enderror">

                    <p class="mt-1.5 text-xs text-slate-500">
                        Allowed formats: JPG, JPEG, PNG, WEBP.
                    </p>

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            {{-- Actions --}}
            <div class="flex flex-wrap items-center justify-end gap-3 pb-6">
                <a href="#"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Cancel
                </a>

                <button type="submit"
                    class="rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                    Create Product
                </button>
            </div>

        </form>
    </div>
@endsection
