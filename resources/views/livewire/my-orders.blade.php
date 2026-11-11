
<div class="mx-auto w-full px-4 py-10">

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">
            My Orders
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Track and manage your orders.
        </p>
    </div>

    @forelse ($orders as $order)

        <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            {{-- Order Header --}}
            <div class="flex flex-wrap items-center justify-between gap-4 bg-gray-50 p-5">

                <div>
                    <p class="text-xs text-gray-500">Order Number</p>

                    <h3 class="font-semibold text-gray-900">
                        {{ $order->order_number }}
                    </h3>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Order Date</p>

                    <p class="text-sm font-medium">
                        {{ $order->created_at->format('d M Y') }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-gray-500">Total Amount</p>

                    <p class="font-bold text-gray-900">
                        Rs. {{ number_format($order->grand_total, 2) }}
                    </p>
                </div>

                <div>
                    <p class="mb-1 text-xs text-gray-500">Order Status</p>

                    <span class="rounded-full px-3 py-1 text-xs font-semibold
                        {{ $order->status === 'delivered'
                            ? 'bg-green-100 text-green-700'
                            : ($order->status === 'cancelled'
                                ? 'bg-red-100 text-red-700'
                                : 'bg-yellow-100 text-yellow-700') }}">

                        {{ ucfirst($order->status) }}

                    </span>
                </div>

            </div>

            {{-- Order Products --}}
            <div class="divide-y divide-gray-100 p-5">

                @foreach ($order->items as $item)

                    <div class="flex items-center gap-4 py-4">

                        {{-- Product Image --}}
                        <div class="h-20 w-20 shrink-0 rounded-lg bg-gray-100 p-2">

                            @if ($item->product?->image)
                                <img
                                    src="{{ asset('storage/' . $item->product->image) }}"
                                    class="h-full w-full object-contain"
                                    alt="{{ $item->product->name }}"
                                >
                            @else
                                <div class="flex h-full items-center justify-center text-xs text-gray-400">
                                    No Image
                                </div>
                            @endif

                        </div>

                        {{-- Product Details --}}
                        <div class="flex-1">

                            <h4 class="font-semibold text-gray-900">
                                {{ $item->product?->name ?? 'Product unavailable' }}
                            </h4>

                            <p class="mt-1 text-sm text-gray-500">
                                Quantity: {{ $item->quantity }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Price: Rs. {{ number_format($item->price, 2) }}
                            </p>

                        </div>

                        {{-- Item Subtotal --}}
                        <div class="text-right">

                            <p class="font-semibold text-gray-900">
                                Rs. {{ number_format($item->subtotal, 2) }}
                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- Order Footer --}}
            <div class="flex flex-wrap justify-between gap-3 border-t border-gray-200 p-5">

                <div class="text-sm text-gray-600">
                    Payment:
                    <span class="font-medium text-gray-900">
                        {{ strtoupper($order->payment_method) }}
                    </span>

                    <span class="ml-2 rounded bg-gray-100 px-2 py-1 text-xs">
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </div>

                <div class="font-bold text-gray-900">
                    Total: Rs. {{ number_format($order->grand_total, 2) }}
                </div>

            </div>

        </div>

    @empty

        <div class="rounded-xl border border-gray-200 bg-white py-16 text-center">

            <h3 class="text-lg font-semibold text-gray-800">
                No Orders Yet!
            </h3>

            <p class="mt-2 text-sm text-gray-500">
                You haven't placed any orders yet.
            </p>

            <a href="{{ route('home') }}"
                class="mt-5 inline-block rounded-lg bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-700">
                Continue Shopping
            </a>

        </div>

    @endforelse

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $orders->links() }}
    </div>

</div>
