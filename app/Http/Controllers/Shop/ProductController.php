<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(Request $request)
{
    $query = Product::where('status', 1);

    if ($request->filled('category')) {
        $query->where('category_id', $request->category);
    }

    if ($request->filled('brand')) {
        $query->where('brand_id', $request->brand);
    }

    $products = $query->latest()->paginate(12);

    return view('pages.products', compact('products'));
}
    
}