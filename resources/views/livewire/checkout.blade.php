<div class="min-h-screen bg-gray-50 py-10">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Checkout
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Complete your delivery information to place your order.
            </p>
        </div>

        <form wire:submit="placeOrder">

            <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">

                {{-- LEFT SECTION --}}
                <div class="space-y-6 lg:col-span-2">

                    {{-- Customer Information --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="mb-6 flex items-center gap-3">
                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Customer Information
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Your contact details
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            {{-- Name --}}
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Full Name *
                                </label>

                                <input type="text" wire:model="customer_name" placeholder="Enter your full name"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                @error('customer_name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Email Address *
                                </label>

                                <input type="email" wire:model="customer_email" placeholder="example@gmail.com"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                @error('customer_email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div class="sm:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Phone Number *
                                </label>

                                <input type="tel" wire:model="customer_phone" placeholder="98XXXXXXXX"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                @error('customer_phone')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- Delivery Information --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="mb-6 flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-gray-900">
                                    Delivery Information
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Where should we deliver your order?
                                </p>
                            </div>

                        </div>

                        <div class="space-y-5">

                            {{-- Address --}}
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Delivery Address *
                                </label>

                                <textarea wire:model="delivery_address" rows="3" placeholder="House number, street, area..."
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"></textarea>

                                @error('delivery_address')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- City and Province --}}
                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        City *
                                    </label>

                                    <input type="text" wire:model="city" placeholder="Enter city"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                    @error('city')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-medium text-gray-700">
                                        Province *
                                    </label>

                                    <select wire:model="province"
                                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                        <option value="">Select Province</option>
                                        <option value="Koshi">Koshi</option>
                                        <option value="Madhesh">Madhesh</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Karnali">Karnali</option>
                                        <option value="Sudurpashchim">Sudurpashchim</option>

                                    </select>

                                    @error('province')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            {{-- Postal Code --}}
                            <div>
                                <label class="mb-2 block text-sm font-medium text-gray-700">
                                    Postal Code
                                    <span class="text-gray-400">(Optional)</span>
                                </label>

                                <input type="text" wire:model="postal_code" placeholder="Postal code"
                                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                                @error('postal_code')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="mb-5">
                            <h2 class="text-lg font-bold text-gray-900">
                                Payment Method
                            </h2>

                            <p class="mt-1 text-sm text-gray-500">
                                Select your preferred payment method.
                            </p>
                        </div>

                        <label
                            class="flex cursor-pointer items-center gap-4 rounded-xl border-2 border-indigo-500 bg-indigo-50/50 p-4">

                            <input type="radio" wire:model="payment_method" value="cod"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500">

                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-lg bg-white text-green-600 shadow-sm">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7h18v12H3zM3 11h18M7 15h3" />
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900">
                                    Cash on Delivery
                                </h3>
                                <p class="mt-1 text-xs text-gray-500">
                                    Pay when your order arrives.
                                </p>
                            </div>

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                Available
                            </span>

                        </label>

                    </div>

                    {{-- Order Notes --}}
                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <h2 class="mb-4 text-lg font-bold text-gray-900">
                            Order Notes
                            <span class="text-sm font-normal text-gray-400">
                                (Optional)
                            </span>
                        </h2>

                        <textarea wire:model="notes" rows="3" placeholder="Any special instructions for your order..."
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"></textarea>

                        @error('notes')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                {{-- RIGHT SECTION: ORDER SUMMARY --}}
                <div class="lg:sticky lg:top-24">

                    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <h2 class="text-lg font-bold text-gray-900">
                            Order Summary
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Review your order before placing it.
                        </p>

                        {{-- Cart products will be connected next --}}

                        {{-- <div class="mt-6 border-t border-gray-100 pt-5">

                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Subtotal</span>
                                <span class="font-semibold text-gray-900">
                                    Rs. 0.00
                                </span>
                            </div>

                            <div class="mt-4 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Shipping Fee</span>
                                <span class="font-semibold text-green-600">
                                    Calculated later
                                </span>
                            </div>

                            <div class="mt-5 border-t border-gray-200 pt-5">

                                <div class="flex items-center justify-between">
                                    <span class="text-base font-bold text-gray-900">
                                        Grand Total
                                    </span>

                                    <span class="text-xl font-bold text-indigo-600">
                                        Rs. 0.00
                                    </span>
                                </div>

                            </div>

                        </div> --}}

                        {{-- Cart Products --}}
                        <div class="mt-6 space-y-4">

                            @forelse ($items as $item)
                                <div wire:key="checkout-item-{{ $item['id'] }}" class="flex items-center gap-3">
                                    

                                    {{-- Product Image --}}
                                    <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-lg bg-gray-100">
                                        

                                        @if ($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                alt="{{ $item['name'] }}" class="h-full w-full object-contain p-1">
                                        @else
                                            <div class="flex h-full items-center justify-center text-xs text-gray-400">
                                                No Image
                                            </div>
                                        @endif

                                        <span
                                            class="absolute -right-0.5 -top-0.5 flex h-5 min-w-5 items-center justify-center rounded-full bg-indigo-600 px-1 text-xs font-bold text-white">
                                            {{ $item['quantity'] }}
                                        </span>

                                    </div>

                                    {{-- Product Details --}}
                                    <div class="min-w-0 flex-1">

                                        <h3 class="truncate text-sm font-semibold text-gray-800">
                                            {{ $item['name'] }}
                                        </h3>

                                        <p class="mt-1 text-xs text-gray-500">
                                            Rs. {{ number_format($item['price'], 2) }}
                                            × {{ $item['quantity'] }}
                                        </p>

                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="shrink-0 text-right">

                                        <p class="text-sm font-semibold text-gray-900">
                                            Rs. {{ number_format($item['subtotal'], 2) }}
                                        </p>

                                    </div>

                                </div>

                            @empty

                                <div class="rounded-lg bg-gray-50 p-5 text-center">
                                    <p class="text-sm text-gray-500">
                                        Your cart is empty.
                                    </p>

                                    <a href="{{ route('products') }}"
                                        class="mt-2 inline-block text-sm font-semibold text-indigo-600">
                                        Continue Shopping
                                    </a>
                                </div>
                            @endforelse

                        </div>

                        {{-- Price Summary --}}
                        <div class="mt-6 border-t border-gray-100 pt-5">

                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500">Total Items</span>

                                <span class="font-semibold text-gray-900">
                                    {{ $items->sum('quantity') }}
                                </span>
                            </div>

                            <div class="mt-4 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Subtotal</span>

                                <span class="font-semibold text-gray-900">
                                    Rs. {{ number_format($subtotal, 2) }}
                                </span>
                            </div>

                            <div class="mt-4 flex items-center justify-between text-sm">
                                <span class="text-gray-500">Shipping Fee</span>

                                <span class="font-semibold text-green-600">
                                    @if ($shipping_fee > 0)
                                        Rs. {{ number_format($shipping_fee, 2) }}
                                    @else
                                        Free
                                    @endif
                                </span>
                            </div>

                            <div class="mt-5 border-t border-gray-200 pt-5">

                                <div class="flex items-center justify-between">

                                    <span class="text-base font-bold text-gray-900">
                                        Grand Total
                                    </span>

                                    <span class="text-xl font-bold text-indigo-600">
                                        Rs. {{ number_format($grand_total, 2) }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Place Order --}}
                        <button type="submit" wire:loading.attr="disabled"
                            class="mt-6 flex w-full items-center justify-center gap-2 rounded-lg bg-indigo-600 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-indigo-700 disabled:cursor-not-allowed disabled:opacity-60">

                            <span wire:loading.remove wire:target="placeOrder">
                                Place Order
                            </span>

                            <span wire:loading wire:target="placeOrder">
                                Processing...
                            </span>

                        </button>

                        <p class="mt-4 text-center text-xs text-gray-500">
                            Your order will be processed securely.
                        </p>

                    </div>

                    {{-- Back to Cart --}}
                    <a href="{{ route('cart') }}" wire:navigate
                        class="mt-4 flex items-center justify-center gap-2 text-sm font-medium text-indigo-600 hover:text-indigo-700">
                        ← Return to Cart
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>
