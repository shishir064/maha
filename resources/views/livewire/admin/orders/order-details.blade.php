
<div class="min-h-screen bg-gray-50 p-4 sm:p-6">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">

        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.orders.index') }}"
                    class="rounded-lg border border-gray-200 bg-white p-2 text-gray-600 hover:bg-gray-100">
                    <x-heroicon-o-arrow-left class="h-5 w-5" />
                </a>

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Order Details
                    </h1>

                    <p class="mt-1 text-sm text-gray-500">
                        Order #{{ $order->order_number }}
                    </p>
                </div>
            </div>
        </div>

        <span class="rounded-full px-4 py-2 text-sm font-semibold
            @class([
                'bg-yellow-100 text-yellow-700' => $order->status === 'pending',
                'bg-blue-100 text-blue-700' => in_array($order->status, ['confirmed', 'processing']),
                'bg-purple-100 text-purple-700' => $order->status === 'shipped',
                'bg-green-100 text-green-700' => $order->status === 'delivered',
                'bg-red-100 text-red-700' => $order->status === 'cancelled',
            ])">

            {{ ucfirst($order->status) }}

        </span>

    </div>

    {{-- Order Information --}}
    <div class="mb-6 grid grid-cols-1 gap-5 md:grid-cols-3">

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="rounded-lg bg-indigo-50 p-3 text-indigo-600">
                    <x-heroicon-o-shopping-bag class="h-6 w-6" />
                </div>

                <div>
                    <p class="text-sm text-gray-500">Order Number</p>
                    <h3 class="font-bold text-gray-800">
                        {{ $order->order_number }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="rounded-lg bg-green-50 p-3 text-green-600">
                    <x-heroicon-o-banknotes class="h-6 w-6" />
                </div>

                <div>
                    <p class="text-sm text-gray-500">Grand Total</p>
                    <h3 class="font-bold text-gray-800">
                        Rs. {{ number_format($order->grand_total, 2) }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="rounded-lg bg-orange-50 p-3 text-orange-600">
                    <x-heroicon-o-calendar-days class="h-6 w-6" />
                </div>

                <div>
                    <p class="text-sm text-gray-500">Order Date</p>
                    <h3 class="font-bold text-gray-800">
                        {{ $order->created_at?->format('d M Y') ?? 'N/A' }}
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- Left Section --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- Products --}}
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

                <div class="border-b border-gray-200 p-5">
                    <h2 class="font-bold text-gray-800">
                        Ordered Products
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        {{ $order->items->count() }} product lines
                    </p>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full whitespace-nowrap text-left text-sm">

                        <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                            <tr>
                                <th class="px-5 py-4">Product</th>
                                <th class="px-5 py-4">Price</th>
                                <th class="px-5 py-4">Qty</th>
                                <th class="px-5 py-4">Discount</th>
                                <th class="px-5 py-4">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @forelse($order->items as $item)

                                <tr wire:key="item-{{ $item->id }}">

                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-3">

                                            @if($item->product?->image)
                                                <img
                                                    src="{{ asset('storage/' . $item->product->image) }}"
                                                    class="h-14 w-14 rounded-lg border object-contain p-1"
                                                    alt="{{ $item->product->name }}">
                                            @else
                                                <div class="flex h-14 w-14 items-center justify-center rounded-lg bg-gray-100">
                                                    <x-heroicon-o-photo class="h-6 w-6 text-gray-400" />
                                                </div>
                                            @endif

                                            <div>
                                                <p class="font-semibold text-gray-800">
                                                    {{ $item->product?->name ?? 'Product unavailable' }}
                                                </p>

                                                <p class="text-xs text-gray-500">
                                                    Product ID: {{ $item->product_id }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        Rs. {{ number_format($item->price, 2) }}
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        {{ $item->quantity }}
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        Rs. {{ number_format($item->discount ?? 0, 2) }}
                                    </td>

                                    <td class="px-5 py-4 font-semibold text-gray-800">
                                        Rs. {{ number_format($item->subtotal, 2) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="px-5 py-10 text-center text-gray-500">
                                        No products found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Customer Information --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <h2 class="mb-5 font-bold text-gray-800">
                    Customer Information
                </h2>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                    <div>
                        <p class="text-sm text-gray-500">Customer Name</p>
                        <p class="mt-1 font-medium text-gray-800">
                            {{ $order->customer_name ?? $order->user?->name ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="mt-1 font-medium text-gray-800">
                            {{ $order->customer_email ?? $order->email ?? $order->user?->email ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="mt-1 font-medium text-gray-800">
                            {{ $order->customer_phone ?? $order->phone ?? 'N/A' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Payment Method</p>
                        <p class="mt-1 font-medium capitalize text-gray-800">
                            {{ $order->payment_method }}
                        </p>
                    </div>

                </div>

            </div>

            {{-- Delivery Information --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <h2 class="mb-5 font-bold text-gray-800">
                    Delivery Information
                </h2>

                <div class="space-y-3">

                    <div>
                        <p class="text-sm text-gray-500">Delivery Address</p>
                        <p class="mt-1 font-medium text-gray-800">
                            {{ $order->delivery_address ?? 'N/A' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">City</p>
                            <p class="mt-1 font-medium text-gray-800">
                                {{ $order->city ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Province</p>
                            <p class="mt-1 font-medium text-gray-800">
                                {{ $order->province ?? 'N/A' }}
                            </p>
                        </div>
                    </div>

                    @if($order->notes)
                        <div>
                            <p class="text-sm text-gray-500">Order Notes</p>
                            <p class="mt-1 text-gray-800">
                                {{ $order->notes }}
                            </p>
                        </div>
                    @endif

                </div>

            </div>

        </div>

        {{-- Right Section --}}
        <div class="space-y-6">

            {{-- Order Summary --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <h2 class="mb-5 font-bold text-gray-800">
                    Order Summary
                </h2>

                <div class="space-y-4 text-sm">

                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-medium text-gray-800">
                            Rs. {{ number_format($order->subtotal, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Tax Amount</span>
                        <span class="font-medium text-gray-800">
                            Rs. {{ number_format($order->tax_amount, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Shipping Fee</span>
                        <span class="font-medium text-gray-800">
                            Rs. {{ number_format($order->shipping_fee, 2) }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-500">Discount</span>
                        <span class="font-medium text-green-600">
                            - Rs. {{ number_format($order->discount_amount, 2) }}
                        </span>
                    </div>

                    <div class="border-t border-dashed pt-4">
                        <div class="flex justify-between">
                            <span class="font-bold text-gray-800">
                                Grand Total
                            </span>

                            <span class="text-lg font-bold text-indigo-600">
                                Rs. {{ number_format($order->grand_total, 2) }}
                            </span>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Payment Information --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

                <h2 class="mb-5 font-bold text-gray-800">
                    Payment Information
                </h2>

                <div class="space-y-4">

                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Method</span>
                        <span class="text-sm font-medium capitalize text-gray-800">
                            {{ $order->payment_method }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-sm text-gray-500">Payment Status</span>

                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
