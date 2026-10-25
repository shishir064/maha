<?php

namespace App\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public $setting = null;

    public function mount(): void
    {
        $this->setting = Setting::first();
    }

    public function render()
    {
        return view('livewire.setting.index', [
            'setting' => $this->setting,
        ]);
    }
}
