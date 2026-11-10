<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'email',
        'phone',
        'delivery_address',
        'city',
        'province',
        'postal_code',
        'notes',
        'total_items',
        'subtotal',
        'tax_amount',
        'shipping_fee',
        'discount_amount',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'tax_amount' => 'decimal:2',
            'shipping_fee' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'grand_total' => 'decimal:2',
        ];
    }

    public function items()
{
    return $this->hasMany(OrderItem::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
