<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class allproducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public function __construct()
    {
        //
        $this->products = Product::where('status',1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.allproducts');
    }
}
