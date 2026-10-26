<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class LatestProducts extends Component
{
    public $products;

    public function __construct()
    {
        $this->products = Product::latest()->take(7)->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.latestproducts');
    }
}