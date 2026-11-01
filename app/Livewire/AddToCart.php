<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\CartService;
use Livewire\Component;

class AddToCart extends Component
{
    public int $productId;

    public function mount(Product $product): void
    {
        $this->productId = $product->id;
    }

    public function addToCart(CartService $cartService): void
{
    $product = Product::findOrFail($this->productId);

    // Add product to cart
    $cartService->add($product);

    // Update cart count
    $this->dispatch('cart-updated');

    // Show success notification
   $this->dispatch(
    'show-success',
    message: $product->name . ' added to cart!'
);
}

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
