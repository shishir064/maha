<?php

namespace App\View\Components;

use App\Models\Slider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sliders extends Component
{
    /**
     * Create a new component instance.
     */
    public $sliders;
    public function __construct()
    {
        //
        $this->sliders =Slider::where('status','1')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sliders');
    }
}
