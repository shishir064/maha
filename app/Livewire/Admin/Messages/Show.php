<?php

namespace App\Livewire\Admin\Messages;

use App\Models\ContactForm as ContactFormModel;
use Livewire\Component;

class Show extends Component
{
    public ContactFormModel $message;

    public function mount($id)
    {
        $this->message = ContactFormModel::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.messages.show');
    }
}
