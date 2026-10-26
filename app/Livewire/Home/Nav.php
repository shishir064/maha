<?php

namespace App\Livewire\Home;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class Nav extends Component
{
    public function render()
    {
        return view('livewire.home.nav', [
            'categories' => Category::orderBy('name')->get(),
            'brands' => Brand::orderBy('name')->get()
        ]);
    }
}