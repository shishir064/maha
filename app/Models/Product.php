<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $guarded = ['id'];

    // Automatically generate a slug when creating a product
    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function types()
    {
        return $this->belongsToMany(Types::class);
    }
    public function getFinalPriceAttribute()
{
    return $this->discount
        ? $this->price - ($this->price * $this->discount / 100)
        : $this->price;
}

public function getInStockAttribute(): bool
{
    return $this->status && $this->stock > 0;
}
}
