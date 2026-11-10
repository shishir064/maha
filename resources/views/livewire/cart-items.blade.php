
<div>
    @if ($items->isEmpty())

        {{-- Empty Cart --}}
        <div class="rounded-xl border border-gray-200 bg-white px-6 py-16 text-center shadow-sm">

            <div class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-gray-100">
                <svg class="h-12 w-12 text-gray-400"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="1.5"
                          d="M3 3h2l2.4 12.2a2 2 0 002 1.6h8.8a2 2 0 002-1.6L22 7H6" />
                    <circle cx="10" cy="21" r="1" />
                    <circle cx="19" cy="21" r="1" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-gray-800">
                Your Cart Is Empty
            </h2>

            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                You haven't added any products to your cart yet.
                Explore our products and find something you love.
            </p>

            <a href="{{ route('products') }}"
               wire:navigate
               class="mt-6 inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                Continue Shopping
            </a>
        </div>

    @else

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3">

            {{-- Cart Products --}}
            <div class="space-y-4 lg:col-span-2">

                @foreach ($items as $item)

                    <div wire:key="cart-item-{{ $item['id'] }}"
                         class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                            {{-- Product Image --}}
                            <div class="flex h-28 w-full shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-50 sm:w-28">
                                @if (!empty($item['image']))
                                    <img
                                        src="{{ asset('storage/' . $item['image']) }}"
                                        alt="{{ $item['name'] }}"
                                        class="h-full w-full object-contain p-2"
                                    >
                                @else
                                    <span class="text-sm text-gray-400">
                                        No Image
                                    </span>
                                @endif
                            </div>

                            {{-- Product Information --}}
                            <div class="min-w-0 flex-1">

                                <h3 class="break-words text-base font-semibold text-gray-800">
                                    {{ $item['name'] }}
                                </h3>

                                <p class="mt-2 text-sm text-gray-500">
                                    Unit Price:
                                    <span class="font-medium text-gray-800">
                                        Rs. {{ number_format($item['price'], 2) }}
                                    </span>
                                </p>

                                <p class="mt-1 text-sm font-semibold text-indigo-600">
                                    Subtotal:
                                    Rs. {{ number_format($item['subtotal'], 2) }}
                                </p>

                            </div>

                            {{-- Quantity and Remove --}}
                            <div class="flex shrink-0 items-center justify-between gap-5 sm:flex-col sm:items-end">

                                {{-- Quantity --}}
                                <div class="flex items-center overflow-hidden rounded-lg border border-gray-300">

                                    <button
                                        type="button"
                                        wire:click="decreaseQuantity({{ $item['id'] }})"
                                        wire:loading.attr="disabled"
                                        wire:target="decreaseQuantity({{ $item['id'] }})"
                                        @disabled($item['quantity'] <= 1)
                                        class="flex h-9 w-9 items-center justify-center text-lg text-gray-600 transition hover:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-40">
                                        −
                                    </button>

                                    <span class="min-w-10 text-center text-sm font-semibold text-gray-800">
                                        {{ $item['quantity'] }}
                                    </span>

                                    <button
                                        type="button"
                                        wire:click="increaseQuantity({{ $item['id'] }})"
                                        wire:loading.attr="disabled"
                                        wire:target="increaseQuantity({{ $item['id'] }})"
                                        class="flex h-9 w-9 items-center justify-center text-lg text-gray-600 transition hover:bg-gray-100">
                                        +
                                    </button>

                                </div>

                                {{-- Remove --}}
                                <button
                                    type="button"
                                    wire:click="removeItem({{ $item['id'] }})"
                                    wire:confirm="Are you sure you want to remove this product?"
                                    wire:loading.attr="disabled"
                                    wire:target="removeItem({{ $item['id'] }})"
                                    class="text-sm font-medium text-red-500 transition hover:text-red-700">
                                    Remove
                                </button>

                            </div>

                        </div>
                    </div>

                @endforeach

                {{-- Continue Shopping --}}
                <div class="pt-2">
                    <a href="{{ route('products') }}"
                       wire:navigate
                       class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                        <span>←</span>
                        Continue Shopping
                    </a>
                </div>

            </div>

            {{-- Order Summary --}}
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6 lg:sticky lg:top-24">

                <h2 class="text-lg font-bold text-gray-900">
                    Order Summary
                </h2>

                <div class="mt-6 space-y-4">

                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-medium text-gray-900">
                            Rs. {{ number_format($total, 2) }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span>Shipping</span>
                        <span class="font-medium text-green-600">
                            Calculated at checkout
                        </span>
                    </div>

                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between gap-3">
                            <span class="font-semibold text-gray-900">
                                Total
                            </span>

                            <span class="text-xl font-bold text-indigo-600">
                                Rs. {{ number_format($total, 2) }}
                            </span>
                        </div>
                    </div>

                </div>

                <a href="{{ route('checkout') }}" wire:navigate
                   class="mt-6 flex w-full items-center justify-center rounded-lg bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700">
                    Proceed to Checkout
                </a>

                <p class="mt-3 text-center text-xs text-gray-500">
                    Secure checkout coming soon.
                </p>

            </div>

        </div>

    @endif
</div>
