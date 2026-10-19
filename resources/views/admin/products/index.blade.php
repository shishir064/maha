@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-slate-50 p-4 sm:p-6">

        {{-- Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm text-slate-500">Catalog / Products</p>
                <h1 class="mt-1 text-2xl font-bold text-slate-800">
                    Products
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Manage products, categories, brands, pricing and inventory.
                </p>
            </div>

            <a href="{{ route('admin.products.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                <i class="fa-solid fa-plus"></i>
                Add Product
            </a>
        </div>

{{-- Products Table --}}
<div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

    {{-- Table Header --}}
    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 px-4 py-4">
        <div>
            <h2 class="text-base font-bold text-slate-800">All Products</h2>
            <p class="mt-1 text-xs text-slate-500">
                Manage your product catalog and inventory.
            </p>
        </div>

        <span class="rounded-lg bg-teal-50 px-3 py-1.5 text-xs font-semibold text-teal-700">
            {{ $products->total() }} Products
        </span>
    </div>

    {{-- Responsive Table: No Horizontal Slider --}}
    <div class="w-full">
        <table class="w-full table-fixed text-left text-xs">

            <thead class="bg-slate-50 text-[10px] font-bold uppercase tracking-wide text-slate-500">
                <tr>
                     <th class="w-[4%] px-2 py-3">sn</th>
                    <th class="w-[19%] px-2 py-3">Product</th>
                    <th class="w-[11%] px-1.5 py-3">Category</th>
                    <th class="w-[10%] px-1.5 py-3">Brand</th>
                    <th class="w-[15%] px-1.5 py-3">Audience</th>
                    <th class="w-[12%] px-1.5 py-3">Price</th>
                    <th class="w-[8%] px-1 py-3">Discount</th>
                    <th class="w-[7%] px-1 py-3 text-center">Stock</th>
                    <th class="w-[9%] px-1 py-3">Status</th>
                    <th class="w-[15%] px-1 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse ($products as $product)
                    <tr class="transition-colors hover:bg-teal-50/40">
 <td class="px-2 py-3">
{{$loop->iteration}} 
</td>
                        {{-- Product --}}
                        <td class="px-2 py-3">
                            <div class="flex min-w-0 items-center gap-2">
                                <div class="hidden h-9 w-9 shrink-0 items-center justify-center overflow-hidden rounded-lg border border-slate-200 bg-slate-50 sm:flex">
                                    @if ($product->image)
                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-full w-full object-cover"
                                        >
                                    @else
                                        <i class="fa-solid fa-box-open text-slate-400"></i>
                                    @endif
                                </div>

                                <span
                                    class="break-words font-semibold leading-4 text-slate-800"
                                    title="{{ $product->name }}"
                                >
                                    {{ $product->name }}
                                </span>
                            </div>
                        </td>

                        {{-- Category --}}
                        <td class="break-words px-1.5 py-3 text-slate-600">
                            {{ $product->category?->name ?? '—' }}
                        </td>

                        {{-- Brand --}}
                        <td class="break-words px-1.5 py-3 text-slate-600">
                            {{ $product->brand?->name ?? '—' }}
                        </td>

                        {{-- Audience Types --}}
                        <td class="px-1.5 py-3">
                            <div class="flex flex-wrap gap-1">
                                @forelse ($product->types as $type)
                                    <span class="break-words rounded-md bg-orange-50 px-1.5 py-1 text-[10px] font-medium leading-3 text-orange-700">
                                        {{ $type->name }}
                                    </span>
                                @empty
                                    <span class="text-slate-400">—</span>
                                @endforelse
                            </div>
                        </td>

                        {{-- Selling Price --}}
                        <td class="break-words px-1.5 py-3 font-semibold text-slate-800">
                            {{ number_format($product->price, 2) }}
                        </td>

                        {{-- Discount --}}
                        <td class="px-1 py-3">
                            @if ($product->discount !== null && $product->discount > 0)
                                <span class="inline-block rounded-md bg-red-50 px-1.5 py-1 text-[10px] font-semibold text-red-600">
                                    {{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%
                                </span>
                            @else
                                <span class="text-slate-400">—</span>
                            @endif
                        </td>

                        {{-- Stock --}}
                        <td class="px-1 py-3 text-center">
                            @if ($product->stock <= 0)
                                <span class="font-bold text-red-600">
                                    {{ $product->stock }}
                                </span>
                                <p class="mt-1 text-[9px] leading-3 text-red-500">Out of stock</p>
                            @elseif ($product->stock <= 5)
                                <span class="font-bold text-orange-600">
                                    {{ $product->stock }}
                                </span>
                                <p class="mt-1 text-[9px] leading-3 text-orange-500">Low stock</p>
                            @else
                                <span class="font-bold text-green-700">
                                    {{ $product->stock }}
                                </span>
                            @endif
                        </td>

                        {{-- Status --}}
                        <td class="px-1 py-3">
                            @if ($product->status)
                                <span class="inline-block rounded-md bg-green-50 px-1.5 py-1 text-[10px] font-semibold leading-3 text-green-700">
                                    Available
                                </span>
                            @else
                                <span class="inline-block rounded-md bg-red-50 px-1.5 py-1 text-[10px] font-semibold leading-3 text-red-700">
                                    Unavailable
                                </span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-1 py-3">
                            <div class="flex flex-wrap items-center justify-center gap-1">
<a href=""
                                   title="View"
                                   aria-label="View product"
                                   class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-blue-50 text-blue-700 transition hover:bg-blue-600 hover:text-white">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                             

                                {{-- Edit --}}
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   title="Edit"
                                   aria-label="Edit product"
                                   class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-green-50 text-green-700 transition hover:bg-green-600 hover:text-white">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            title="Delete"
                                            aria-label="Delete product"
                                            class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-red-50 text-red-600 transition hover:bg-red-600 hover:text-white">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center">
                            <i class="fa-solid fa-box-open text-3xl text-slate-300"></i>

                            <p class="mt-3 font-semibold text-slate-700">
                                No products found
                            </p>

                            <p class="mt-1 text-sm text-slate-500">
                                Add a product to get started.
                            </p>

                            <a href="{{ route('admin.products.create') }}"
                               class="mt-4 inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-teal-700">
                                <i class="fa-solid fa-plus"></i>
                                Add Product
                            </a>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($products->hasPages())
        <div class="border-t border-slate-200 px-4 py-3">
            {{ $products->links() }}
        </div>
    @endif

</div>
@endsection
