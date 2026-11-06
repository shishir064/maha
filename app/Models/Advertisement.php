<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class Advertisement extends Model
{
    protected $guarded = ['id'];

    public function getUrlAttribute()
    {
        switch ($this->link_type) {

            case 'product':
                $product = Product::find($this->link_id);

                return $product
                    ? route('products.details', $product->slug)
                    : '#';

           case 'category':
    return route('products', ['category' => $this->link_id]);

case 'brand':
    return route('products', ['brand' => $this->link_id]);

            default:
                return '#';
        }
    }
}