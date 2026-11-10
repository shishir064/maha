
@extends('layouts.app')

@section('content')

@php
    $fieldClass = 'w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
    $labelClass = 'mb-1.5 block text-sm font-medium text-gray-700';
@endphp

<div class="min-h-screen bg-gray-50 px-4 py-6 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- Page Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-gray-500">
                    <a href="{{ route('admin.orders.create') }}" class="hover:text-blue-600">
                        Orders
                    </a>
                    <span>/</span>
                    <span class="font-medium text-gray-800">Create Order</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                    Create New Order
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Create an order by adding customer details and products.
                </p>
            </div>

            <a href="{{ route('admin.orders.create') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">
                <span>&larr;</span>
                Back
            </a>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                <span class="font-bold">✓</span>
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <h3 class="mb-2 text-sm font-semibold text-red-800">
                    Please correct the following errors:
                </h3>

                <ul class="list-inside list-disc space-y-1 text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.orders.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3">

                {{-- LEFT COLUMN --}}
                <div class="space-y-6 lg:col-span-2">

                    {{-- Customer Information --}}
                    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="flex items-center gap-3 border-b border-gray-100 px-5 py-4 sm:px-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                          d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m12-13a4 4 0 11-8 0 4 4 0 018 0zm2 4a4 4 0 014 4v2"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-900">Customer Information</h2>
                                <p class="text-xs text-gray-500">Enter customer contact details.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-6">

                            <div>
                                <label class="{{ $labelClass }}">Customer Name <span class="text-red-500">*</span></label>
                                <input type="text" name="customer_name"
                                       value="{{ old('customer_name') }}"
                                       placeholder="Enter customer name"
                                       required class="{{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Enter email address"
                                       required class="{{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Phone Number <span class="text-red-500">*</span></label>
                                <input type="text" name="phone"
                                       value="{{ old('phone') }}"
                                       placeholder="Enter phone number"
                                       required class="{{ $fieldClass }}">
                            </div>

                        </div>
                    </section>

                    {{-- Delivery Information --}}
                    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="flex items-center gap-3 border-b border-gray-100 px-5 py-4 sm:px-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 7h11v10H3zM14 10h4l3 3v4h-7zM7 20a2 2 0 100-4 2 2 0 000 4zm11 0a2 2 0 100-4 2 2 0 000 4z"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-900">Delivery Information</h2>
                                <p class="text-xs text-gray-500">Where should the order be delivered?</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 sm:p-6">

                            <div>
                                <label class="{{ $labelClass }}">Province <span class="text-red-500">*</span></label>
                                <input type="text" name="province"
                                       value="{{ old('province') }}"
                                       placeholder="Enter province"
                                       required class="{{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">District <span class="text-red-500">*</span></label>
                                <input type="text" name="district"
                                       value="{{ old('district') }}"
                                       placeholder="Enter district"
                                       required class="{{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">City / Municipality <span class="text-red-500">*</span></label>
                                <input type="text" name="city"
                                       value="{{ old('city') }}"
                                       placeholder="Enter city"
                                       required class="{{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Ward Number</label>
                                <input type="text" name="ward"
                                       value="{{ old('ward') }}"
                                       placeholder="Enter ward number"
                                       class="{{ $fieldClass }}">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="{{ $labelClass }}">Full Address <span class="text-red-500">*</span></label>
                                <textarea name="address" rows="3"
                                          placeholder="Enter complete delivery address"
                                          required class="{{ $fieldClass }}">{{ old('address') }}</textarea>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="{{ $labelClass }}">Landmark</label>
                                <input type="text" name="landmark"
                                       value="{{ old('landmark') }}"
                                       placeholder="Nearby landmark (optional)"
                                       class="{{ $fieldClass }}">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="{{ $labelClass }}">Order Notes</label>
                                <textarea name="notes" rows="2"
                                          placeholder="Additional instructions (optional)"
                                          class="{{ $fieldClass }}">{{ old('notes') }}</textarea>
                            </div>

                        </div>
                    </section>

                    {{-- Products --}}
                    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-gray-100 px-5 py-4 sm:px-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-50 text-orange-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                              d="M3 3h2l2.4 12.2a2 2 0 002 1.8h8.8a2 2 0 002-1.7L22 8H6M10 21h.01M18 21h.01"/>
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="font-semibold text-gray-900">Order Products</h2>
                                    <p class="text-xs text-gray-500">Add products and set quantities.</p>
                                </div>
                            </div>

                            <button type="button" id="add-product"
                                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700">
                                <span class="text-lg leading-none">+</span>
                                Add Product
                            </button>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[700px] text-left text-sm">
                                <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                                    <tr>
                                        <th class="px-5 py-3 font-semibold">Product</th>
                                        <th class="px-4 py-3 font-semibold">Price</th>
                                        <th class="px-4 py-3 font-semibold">Qty</th>
                                        <th class="px-4 py-3 font-semibold">Discount</th>
                                        <th class="px-4 py-3 font-semibold">Subtotal</th>
                                        <th class="px-4 py-3 text-center font-semibold">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="product-rows" class="divide-y divide-gray-100">
                                </tbody>
                            </table>
                        </div>

                        <div class="border-t border-gray-100 bg-gray-50 px-5 py-3">
                            <p class="text-xs text-gray-500">
                                Product prices are verified from the database when the order is saved.
                                Discount is applied to the entire product row.
                            </p>
                        </div>
                    </section>

                    {{-- Payment Information --}}
                    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="flex items-center gap-3 border-b border-gray-100 px-5 py-4 sm:px-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-50 text-green-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 7h18v12H3zM3 10h18M7 15h3"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-900">Payment & Order Status</h2>
                                <p class="text-xs text-gray-500">Choose payment and order status.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-3 sm:p-6">

                            <div>
                                <label class="{{ $labelClass }}">Payment Method</label>
                                <select name="payment_method" required class="{{ $fieldClass }}">
                                    <option value="cod" @selected(old('payment_method', 'cod') === 'cod')>Cash on Delivery</option>
                                    <option value="bank_transfer" @selected(old('payment_method') === 'bank_transfer')>Bank Transfer</option>
                                    <option value="esewa" @selected(old('payment_method') === 'esewa')>eSewa</option>
                                    <option value="khalti" @selected(old('payment_method') === 'khalti')>Khalti</option>
                                </select>
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Payment Status</label>
                                <select name="payment_status" required class="{{ $fieldClass }}">
                                    <option value="pending" @selected(old('payment_status', 'pending') === 'pending')>Pending</option>
                                    <option value="paid" @selected(old('payment_status') === 'paid')>Paid</option>
                                    <option value="failed" @selected(old('payment_status') === 'failed')>Failed</option>
                                    <option value="refunded" @selected(old('payment_status') === 'refunded')>Refunded</option>
                                </select>
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Order Status</label>
                                <select name="status" required class="{{ $fieldClass }}">
                                    <option value="pending" @selected(old('status', 'pending') === 'pending')>Pending</option>
                                    <option value="confirmed" @selected(old('status') === 'confirmed')>Confirmed</option>
                                    <option value="processing" @selected(old('status') === 'processing')>Processing</option>
                                    <option value="shipped" @selected(old('status') === 'shipped')>Shipped</option>
                                    <option value="delivered" @selected(old('status') === 'delivered')>Delivered</option>
                                    <option value="cancelled" @selected(old('status') === 'cancelled')>Cancelled</option>
                                </select>
                            </div>

                        </div>
                    </section>

                </div>

                {{-- RIGHT COLUMN: ORDER SUMMARY --}}
                <aside class="space-y-6 lg:sticky lg:top-6">

                    <section class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                        <div class="border-b border-gray-100 px-5 py-4">
                            <h2 class="font-semibold text-gray-900">Order Summary</h2>
                            <p class="mt-1 text-xs text-gray-500">Review the order amount.</p>
                        </div>

                        <div class="space-y-5 p-5">

                            <div>
                                <label class="{{ $labelClass }}">Tax Amount (NPR)</label>
                                <input type="number" name="tax_amount" id="tax_amount"
                                       value="{{ old('tax_amount', 0) }}"
                                       min="0" step="0.01"
                                       class="summary-input {{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Shipping Fee (NPR)</label>
                                <input type="number" name="shipping_fee" id="shipping_fee"
                                       value="{{ old('shipping_fee', 0) }}"
                                       min="0" step="0.01"
                                       class="summary-input {{ $fieldClass }}">
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Order Discount (NPR)</label>
                                <input type="number" name="discount_amount" id="discount_amount"
                                       value="{{ old('discount_amount', 0) }}"
                                       min="0" step="0.01"
                                       class="summary-input {{ $fieldClass }}">
                            </div>

                            <div class="space-y-3 border-t border-gray-100 pt-5 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500">Products Subtotal</span>
                                    <span id="products-subtotal" class="font-medium text-gray-800">NPR 0.00</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">Tax + Shipping</span>
                                    <span id="extra-total" class="font-medium text-gray-800">NPR 0.00</span>
                                </div>

                                <div class="flex justify-between">
                                    <span class="text-gray-500">Order Discount</span>
                                    <span id="order-discount-display" class="font-medium text-red-600">- NPR 0.00</span>
                                </div>
                            </div>

                            <div class="rounded-xl bg-blue-50 p-4">
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold text-gray-800">Grand Total</span>
                                    <span id="grand-total" class="text-xl font-bold text-blue-700">NPR 0.00</span>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Final payable amount</p>
                            </div>

                            <button type="submit"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Create Order
                                <span>&rarr;</span>
                            </button>

                            <p class="text-center text-xs text-gray-400">
                                Please review all details before creating the order.
                            </p>

                        </div>
                    </section>

                </aside>

            </div>
        </form>
    </div>
</div>

{{-- Product Row Template --}}
<template id="product-template">
    <tr class="product-row">
        <td class="px-5 py-3">
            <select name="items[INDEX][product_id]" required
                    class="product-select w-full min-w-[180px] rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                <option value="">Select Product</option>

                @foreach ($products as $product)
                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </td>

        <td class="px-4 py-3 whitespace-nowrap">
            <span class="product-price font-medium text-gray-700">NPR 0.00</span>
        </td>

        <td class="px-4 py-3">
            <input type="number" name="items[INDEX][quantity]"
                   value="1" min="1" required
                   class="product-quantity w-16 rounded-lg border border-gray-300 px-2 py-2 text-sm outline-none focus:border-blue-500">
        </td>

        <td class="px-4 py-3">
            <input type="number" name="items[INDEX][discount]"
                   value="0" min="0" step="0.01"
                   class="product-discount w-24 rounded-lg border border-gray-300 px-2 py-2 text-sm outline-none focus:border-blue-500">
        </td>

        <td class="px-4 py-3 whitespace-nowrap">
            <span class="product-subtotal font-semibold text-gray-900">NPR 0.00</span>
        </td>

        <td class="px-4 py-3 text-center">
            <button type="button"
                    class="remove-product rounded-lg p-2 text-red-500 transition hover:bg-red-50 hover:text-red-700"
                    title="Remove product">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"
                          d="M6 7h12m-10 0V5h8v2m-9 0l1 13h8l1-13M10 11v5m4-5v5"/>
                </svg>
            </button>
        </td>
    </tr>
</template>

<script>
(function () {
    function initializeOrderForm() {
        const rows = document.getElementById('product-rows');
        const template = document.getElementById('product-template');
        const addButton = document.getElementById('add-product');

        if (!rows || !template || !addButton || rows.dataset.initialized === 'true') {
            return;
        }

        rows.dataset.initialized = 'true';

        let index = 0;

        const money = amount =>
            'NPR ' + Number(amount).toFixed(2);

        function calculateTotals() {
            let subtotal = 0;

            rows.querySelectorAll('.product-row').forEach(row => {
                const select = row.querySelector('.product-select');
                const option = select.options[select.selectedIndex];

                const price = Number(option?.dataset.price || 0);
                const quantity = Number(row.querySelector('.product-quantity').value || 0);
                const discount = Number(row.querySelector('.product-discount').value || 0);

                const lineTotal = Math.max(0, (price * quantity) - discount);

                row.querySelector('.product-price').textContent = money(price);
                row.querySelector('.product-subtotal').textContent = money(lineTotal);

                subtotal += lineTotal;
            });

            const tax = Number(document.getElementById('tax_amount').value || 0);
            const shipping = Number(document.getElementById('shipping_fee').value || 0);
            const discount = Number(document.getElementById('discount_amount').value || 0);

            const grandTotal = Math.max(0, subtotal + tax + shipping - discount);

            document.getElementById('products-subtotal').textContent = money(subtotal);
            document.getElementById('extra-total').textContent = money(tax + shipping);
            document.getElementById('order-discount-display').textContent = '- ' + money(discount);
            document.getElementById('grand-total').textContent = money(grandTotal);
        }

        function addProductRow() {
            const html = template.innerHTML.replaceAll('INDEX', index);

            rows.insertAdjacentHTML('beforeend', html);

            index++;

            calculateTotals();
        }

        addButton.addEventListener('click', addProductRow);

        rows.addEventListener('input', calculateTotals);
        rows.addEventListener('change', calculateTotals);

        rows.addEventListener('click', function (event) {
            const removeButton = event.target.closest('.remove-product');

            if (removeButton) {
                removeButton.closest('.product-row').remove();
                calculateTotals();
            }
        });

        document.querySelectorAll('.summary-input').forEach(input => {
            input.addEventListener('input', calculateTotals);
        });

        addProductRow();
    }

    document.addEventListener('DOMContentLoaded', initializeOrderForm);
    document.addEventListener('livewire:navigated', initializeOrderForm);
})();
</script>

@endsection
