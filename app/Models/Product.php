<?php

namespace App\Models;

use App\Models\ProductImage;
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

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
{
    return $this->hasOne(ProductImage::class)
        ->where('is_primary', true);
}

    public function getFirstImageAttribute()
    {
        return $this->images()->first();
    }

    public function getImageUrlAttribute()
    {
        return $this->first_image ? asset('storage/' . $this->first_image->image) : null;
    }

public function getInStockAttribute(): bool
{
    return $this->status && $this->stock > 0;
}
}
