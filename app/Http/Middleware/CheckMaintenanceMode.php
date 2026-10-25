<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('CheckMaintenanceMode middleware executed', [
            'path' => $request->path(),
            'maintenance_mode' => Setting::query()->value('maintenance_mode'),
        ]);

        // Allow Super Admin access
        if (
            auth()->check() &&
            auth()->user()->hasRole('super-admin')
        ) {
            return $next($request);
        }

        $maintenanceMode = Setting::query()->value('maintenance_mode');

        if ($maintenanceMode) {
            return response()->view('maintenance', [], 503);
        }

        return $next($request);
    }
}