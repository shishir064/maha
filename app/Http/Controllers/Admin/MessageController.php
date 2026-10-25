<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm as ContactFormModel;

class MessageController extends Controller
{
    public function show($id)
    {
        $message = ContactFormModel::findOrFail($id);

        return view('pages.messages.show', compact('message'));
    }
}