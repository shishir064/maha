<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('pages.setting');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_logo' => 'nullable|file|mimes:jpeg,jpg,png,webp,svg|max:4048',
            'site_name' => 'required|string|max:255',
            'facebook_url' => 'nullable|url',
            'whatsapp_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'store_email' => 'nullable|email',
            'store_phone' => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('site_logo')) {
            $validated['site_logo'] = $request->file('site_logo')
                ->store('settings', 'public');
        }

        Setting::create($validated);

        return redirect()
            ->route('settings.index')
            ->with('success', 'Setting created successfully.');
    }
}
