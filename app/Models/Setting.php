<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'site_logo',
        'site_name',
        'facebook_url',
        'whatsapp_url',
        'tiktok_url',
        'instagram_url',
        'store_email',
        'store_phone',
        'store_address',
        'maintenance_mode',
    ];

    protected function casts(): array
    {
        return [
            'maintenance_mode' => 'boolean',
        ];
    }
}
