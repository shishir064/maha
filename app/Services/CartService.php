<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Add a product to the cart.
     */
    public function add(Product $product): void
    {
        $price = (float) (
            $product->final_price ?? $product->price
        );

        if (Auth::check()) {
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
            ]);

            $item = $cart->items()
                ->where('product_id', $product->id)
                ->first();

            if ($item) {
                $item->increment('quantity');
            } else {
                $cart->items()->create([
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'unit_price' => $price,
                ]);
            }

            return;
        }

        // Guest cart: store in session.
        $cart = session()->get('cart', []);

        $id = (string) $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_price' => $price,
            ];
        }

        session()->put('cart', $cart);
    }

    /**
     * Get the total quantity of products.
     */
    public function count(): int
    {
        if (Auth::check()) {
            return (int) Auth::user()
                ->cart()
                ->with('items')
                ->first()
                ?->items
                ->sum('quantity');
        }

        return (int) collect(session()->get('cart', []))
            ->sum('quantity');
    }
}
