<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class MaintenanceController extends Controller
{
    public function toggle()
    {
        $setting = Setting::first();

        if (! $setting) {
            return back()->with(
                'error',
                'Please configure your website settings first.'
            );
        }

        // Convert the current value to a boolean and toggle it.
        $currentStatus = (bool) $setting->maintenance_mode;

        $setting->maintenance_mode = ! $currentStatus;

        $setting->save();

        return back()->with(
            'success',
            $setting->maintenance_mode
                ? 'Maintenance mode enabled successfully.'
                : 'Maintenance mode disabled successfully.'
        );
    }
}