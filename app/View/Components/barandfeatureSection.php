<?php

namespace App\View\Components;

use App\Models\Brandfeatured;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class barandfeatureSection extends Component
{
    /**
     * Create a new component instance.
     */
    public $products;
    public $brandfeatured;
    public function __construct()
    {
        //
        $this->brandfeatured=Brandfeatured::where('status',1)->get();
        $this->products =Product::with('category','brand')->where('brand_id',$this->brandfeatured->brand_id)->limit($this->brandfeatured->product_limit)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barandfeature-section');
    }
}
