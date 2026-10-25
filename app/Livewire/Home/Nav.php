<?php

namespace App\Livewire\Home;

use App\Models\Category;
use Livewire\Component;

class Nav extends Component
{
    public function render()
    {
        return view('livewire.home.nav', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}