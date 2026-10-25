<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Make sure to import this

class SettingController extends Controller
{
    public function index()
    {
        // Make sure you are passing the setting to the view here!
        $setting = Setting::first();
        return view('pages.setting', compact('setting'));
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

        // 1. Get the existing setting row, or create a new one if it's the first time
        $setting = Setting::first() ?? new Setting();

        // 2. Handle the file upload
        if ($request->hasFile('site_logo')) {
            // Delete the old image from storage if it exists
            if ($setting->site_logo && Storage::disk('public')->exists($setting->site_logo)) {
                Storage::disk('public')->delete($setting->site_logo);
            }

            // Store the new image and add the path to the $validated array
            $validated['site_logo'] = $request->file('site_logo')->store('settings', 'public');
        }

        // 3. Update the existing row (or save the new one)
        $setting->fill($validated);
        $setting->save();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}