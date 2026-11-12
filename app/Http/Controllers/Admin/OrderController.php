<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        return view('pages.orderlist');
    }

    public function show(Order $order)
    {
        return view('pages.order-detail', compact('order'));
    }
    public function create()
    {
        $products = Product::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.orders.create', compact('products'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'ward' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'landmark' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],

            'shipping_fee' => ['nullable', 'numeric', 'min:0'],
            'tax_amount' => ['nullable', 'numeric', 'min:0'],
            'discount_amount' => ['nullable', 'numeric', 'min:0'],

            'payment_method' => [
                'required',
                'in:cod,bank_transfer,esewa,khalti',
            ],
            'payment_status' => [
                'required',
                'in:pending,paid,failed,refunded',
            ],
            'status' => [
                'required',
                'in:pending,confirmed,processing,shipped,delivered,cancelled',
            ],

            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => [
                'required',
                'integer',
                'exists:products,id',
            ],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'items.*.discount' => ['nullable', 'numeric', 'min:0'],
        ]);
        DB::transaction(function () use ($validated) {
            $subtotal = 0;
            $totalItems = 0;
            $orderItems = [];

            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                // Use the product's database price, not the submitted price.
                $price = (float) $product->price;
                $quantity = (int) $item['quantity'];
                $discount = (float) ($item['discount'] ?? 0);

                $itemTotal = $price * $quantity;

                if ($discount > $itemTotal) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'items' => "Discount cannot exceed the total price of {$product->name}.",
                    ]);
                }

                $itemSubtotal = $itemTotal - $discount;

                $subtotal += $itemSubtotal;
                $totalItems += $quantity;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'discount' => $discount,
                    'subtotal' => $itemSubtotal,
                ];
            }

            $tax = (float) ($validated['tax_amount'] ?? 0);
            $shipping = (float) ($validated['shipping_fee'] ?? 0);
            $orderDiscount = (float) ($validated['discount_amount'] ?? 0);

            $grandTotal = max(
                0,
                $subtotal + $tax + $shipping - $orderDiscount
            );

            $user = User::create([
                'name' => $validated['customer_name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['email']), // Default password, should be changed by user
                'phone' => $validated['phone'],
                'province' => $validated['province'],
                'district' => $validated['district'],
                'city' => $validated['city'],
                'ward' => $validated['ward'] ?? null,
                'address' => $validated['address'],
                'landmark' => $validated['landmark'] ?? null,
            ]);

            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . now()->format('Ymd') . '-' . Str::upper(Str::random(5)),
                'notes' => $validated['notes'] ?? null,
                'total_items' => $totalItems,
                'subtotal' => $subtotal,
                'tax_amount' => $tax,
                'shipping_fee' => $shipping,
                'discount_amount' => $orderDiscount,
                'grand_total' => $grandTotal,
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_status'],
                'status' => $validated['status'],
            ]);

            $order->items()->createMany($orderItems);
        });

        return redirect()
            ->route('admin.orders.create')
            ->with('success', 'Order created successfully!');
    }
}