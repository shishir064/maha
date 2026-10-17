<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('pages.setting');
    }
    Public function store(Request $request){
        $validated = $request->validate([
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_name' => 'required',
            'facebook_url' => 'required',
            'whatsapp_url' => 'required',
            'instagram_url' => 'required',
            'store_email' => 'required',
            'store_phone' => 'required',
        ]);
        dd($validated);
    }
}
