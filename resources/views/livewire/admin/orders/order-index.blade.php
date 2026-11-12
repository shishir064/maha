
<div class="p-6">

    {{-- Header --}}
    <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Orders
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Manage and track customer orders.
            </p>
        </div>

        <div class="text-sm text-gray-500">
            <a
                href="{{ route('admin.orders.create') }}"
                wire:navigate
                class="rounded-lg bg-indigo-600 px-4 py-2 font-medium text-white shadow-sm hover:bg-indigo-700">
                Create New Order
            </a>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

        <div class="mb-4 flex items-center justify-between">
            <h2 class="font-semibold text-gray-800">
                Filter Orders
            </h2>

            <button
                wire:click="resetFilters"
                class="text-sm font-medium text-red-600 hover:text-red-700">
                Reset Filters
            </button>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">

            {{-- Search --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-600">
                    Search
                </label>

                <input
                    type="text"
                    wire:model.live.debounce.400ms="search"
                    placeholder="Order ID or customer..."
                    class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- Status --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-600">
                    Order Status
                </label>

                <select
                    wire:model.live="status"
                    class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            {{-- Payment Method --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-600">
                    Payment Method
                </label>

                <select
                    wire:model.live="paymentMethod"
                    class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                    <option value="">All Methods</option>
                    <option value="cash">Cash</option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="esewa">eSewa</option>
                    <option value="khalti">Khalti</option>
                </select>
            </div>

            {{-- From Date --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-600">
                    From Date
                </label>

                <input
                    type="date"
                    wire:model.live="fromDate"
                    class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            {{-- To Date --}}
            <div>
                <label class="mb-1 block text-sm font-medium text-gray-600">
                    To Date
                </label>

                <input
                    type="date"
                    wire:model.live="toDate"
                    class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

        </div>
    </div>

    {{-- Orders Table --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full whitespace-nowrap text-left text-sm">

                <thead class="border-b bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-6 py-4">Order Number</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Total Amount</th>
                        <th class="px-6 py-4">Payment</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Order Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse ($orders as $order)

                        <tr wire:key="order-{{ $order->order_number }}"
                            class="transition hover:bg-gray-50">

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                #{{ $order->order_number }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-800">
                                    {{ $order->user?->name ?? 'Unknown' }}
                                </div>

                                <div class="text-xs text-gray-500">
                                    {{ $order->user?->email ?? 'N/A' }}
                                </div>
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800">
                                Rs. {{ number_format($order->grand_total, 2) }}
                            </td>

                            <td class="px-6 py-4 capitalize text-gray-600">
                                {{ $order->payment_method }}
                            </td>

                            <td class="px-6 py-4">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'processing' => 'bg-blue-100 text-blue-700',
                                        'completed' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-red-100 text-red-700',
                                    ];

                                    $color = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $color }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-600">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a
                                    href="{{ route('admin.orders.show', $order->id) }}"
                                    
                                    class="font-medium text-indigo-600 hover:text-indigo-800">
                                    View Details
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <p class="font-medium text-gray-500">
                                    No orders found.
                                </p>
                                <p class="mt-1 text-xs text-gray-400">
                                    Try changing your filters.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>

        {{-- Pagination --}}
        <div class="border-t border-gray-200 px-6 py-4">
            {{ $orders->links() }}
        </div>

    </div>

</div>
