<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class CartItems extends Component
{
    // Increase quantity
    public function increaseQuantity($productId): void
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart;

            $item = $cart?->items()
                ->where('product_id', $productId)
                ->first();

            if ($item) {
                $item->increment('quantity');
            }

            $this->dispatch('cart-updated');
            return;
        }

        $cart = session()->get('cart', []);
        $id = (string) $productId;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    // Decrease quantity
    public function decreaseQuantity($productId): void
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart;

            $item = $cart?->items()
                ->where('product_id', $productId)
                ->first();

            if ($item && $item->quantity > 1) {
                $item->decrement('quantity');
            }

            $this->dispatch('cart-updated');
            return;
        }

        $cart = session()->get('cart', []);
        $id = (string) $productId;

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    // Remove product
    public function removeItem($productId): void
    {
        if (Auth::check()) {
            $cart = Auth::user()->cart;

            $cart?->items()
                ->where('product_id', $productId)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            $id = (string) $productId;

            unset($cart[$id]);

            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    // Display cart products
    public function render()
    {
        $items = collect();
        $total = 0;

        if (Auth::check()) {

            // Logged-in user's database cart
            $cart = Auth::user()
                ->cart()
                ->with('items.product')
                ->first();

            if ($cart) {
                $items = $cart->items
                    ->filter(fn ($item) => $item->product)
                    ->map(function ($item) {
                        return [
                            'id' => $item->product->id,
                            'name' => $item->product->name,
                            'image' => $item->product->image,
                            'price' => (float) $item->unit_price,
                            'quantity' => (int) $item->quantity,
                            'subtotal' => (float) $item->unit_price * $item->quantity,
                        ];
                    })
                    ->values();
            }

        } else {

            // Guest user's session cart
            $cart = session()->get('cart', []);

            $products = Product::whereIn('id', array_keys($cart))
                ->get()
                ->keyBy('id');

            foreach ($cart as $id => $cartItem) {

                $product = $products->get($id);

                if (!$product) {
                    continue;
                }

                $price = (float) $cartItem['unit_price'];
                $quantity = (int) $cartItem['quantity'];

                $items->push([
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $price,
                    'quantity' => $quantity,
                    'subtotal' => $price * $quantity,
                ]);
            }
        }

        $total = $items->sum('subtotal');

        return view('livewire.cart-items', compact('items', 'total'));
    }
}
