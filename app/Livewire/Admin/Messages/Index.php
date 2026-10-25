<?php

namespace App\Livewire\Admin\Messages;

use App\Models\ContactForm as ContactFormModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function deleteMessage($id)
    {
        $message = ContactFormModel::findOrFail($id);
        $message->delete();

        session()->flash('success', 'Message deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.messages.index', [
            'messages' => ContactFormModel::latest('id')->paginate(10),
        ]);
    }
}
