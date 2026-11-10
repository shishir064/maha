<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Checkout extends Component
{
    public $customer_name;
    public $customer_email;
    public $customer_phone;

    public $delivery_address;
    public $city;
    public $province;
    public $postal_code;

    public $payment_method = 'cod';
    public $notes;

    public $items;
    public $subtotal = 0;
    public $shipping_fee = 0;
    public $grand_total = 0;

    public function mount(CartService $cartService)
    {
        $user = Auth::user();

        $this->customer_name = $user->name;
        $this->customer_email = $user->email;

        $this->loadCart($cartService);
    }

    public function loadCart(CartService $cartService)
    {
        $cartItems = $cartService->getItems();

        $this->items = collect($cartItems)->map(function ($item) {

            // Database cart item
            $product = is_array($item)
                ? $item['product']
                : $item->product;

            $quantity = is_array($item)
                ? $item['quantity']
                : $item->quantity;

            if (!$product) {
                return null;
            }

            // Always calculate price from the database.
            $price = (float) (
                $product->final_price ?? $product->price
            );

            return [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $price,
                'quantity' => (int) $quantity,
                'subtotal' => $price * $quantity,
            ];

        })->filter()->values();

        $this->subtotal = $this->items->sum('subtotal');

        // Change this according to your delivery policy.
        $this->shipping_fee = 0;

        $this->grand_total = $this->subtotal + $this->shipping_fee;
    }

    protected function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'delivery_address' => 'required|string|max:1000',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'payment_method' => 'required|in:cod',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    
public function placeOrder(CartService $cartService)
{
    $validated = $this->validate();

    $cartItems = $cartService->getItems();

    if ($cartItems->isEmpty()) {
        $this->addError('cart', 'Your cart is empty.');
        return;
    }

    $order = DB::transaction(function () use ($cartItems, $validated) {

        $orderItems = [];

        $subtotal = 0;
        $totalDiscount = 0;
        $totalItems = 0;

        foreach ($cartItems as $item) {

            // Get product ID and quantity from cart.
            $productId = is_array($item)
                ? $item['product']->id
                : $item->product_id;

            $quantity = (int) (
                is_array($item)
                    ? $item['quantity']
                    : $item->quantity
            );

            // Fetch fresh product data from database.
            $product = Product::whereKey($productId)
                ->lockForUpdate()
                ->first();

            if (!$product || $quantity < 1) {
                throw ValidationException::withMessages([
                    'cart' => 'One or more products are no longer available.',
                ]);
            }

            // Calculate price and discount.
            $originalPrice = (float) $product->price;

            $finalPrice = (float) (
                $product->final_price ?? $originalPrice
            );

            $discountPerUnit = max(
                0,
                $originalPrice - $finalPrice
            );

            $itemDiscount = $discountPerUnit * $quantity;

            $itemSubtotal = $finalPrice * $quantity;

            $subtotal += $originalPrice * $quantity;
            $totalDiscount += $itemDiscount;
            $totalItems += $quantity;

            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $originalPrice,
                'discount' => $itemDiscount,
                'subtotal' => $itemSubtotal,
            ];
        }

        // Shipping and tax are currently free.
        $shippingFee = 0;
        $taxAmount = 0;

        $grandTotal = $subtotal
            - $totalDiscount
            + $shippingFee
            + $taxAmount;

        // Create the main order.
        $order = Order::create([

            'user_id' => Auth::id(),

            'order_number' => 'ORD-'
                . now()->format('Ymd')
                . '-'
                . Str::upper(Str::random(6)),

            'customer_name' => $validated['customer_name'],
            'email' => $validated['customer_email'],
            'phone' => $validated['customer_phone'],

            'delivery_address' => $validated['delivery_address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal_code' => $validated['postal_code'] ?? null,

            'notes' => $validated['notes'] ?? null,

            'total_items' => $totalItems,

            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'shipping_fee' => $shippingFee,
            'discount_amount' => $totalDiscount,
            'grand_total' => $grandTotal,

            'payment_method' => $validated['payment_method'],
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        // Save all order products.
        $order->items()->createMany($orderItems);

        return $order;
    });

    // Clear cart only after successful order creation.
    $cartService->clear();

    session()->flash(
        'success',
        'Your order has been placed successfully! Order Number: '
        . $order->order_number
    );

    return redirect('/');
}


    public function render()
    {
        return view('livewire.checkout');
    }
}
