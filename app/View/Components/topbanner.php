<?php

namespace App\View\Components;

use App\Models\Advertisement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class topbanner extends Component
{
    /**
     * Create a new component instance.
     */
    public $banners;
    public function __construct()
    {
        //
        $this->banners =Advertisement::where('position', 'top_banner')
    ->where('status', true)
    ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.topbanner');
    }
}
