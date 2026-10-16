<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductRequet;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(5);
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $brands = Brand::all();
        $types = Types::all();
        $categories = Category::all();
        return view('admin.products.create',compact('brands','categories','types'));
    }

public function store(ProductRequet $request)
{
    $validated = $request->validated();

    // Keep audience type IDs separate from product columns
    $typeIds = $validated['types_of_audiance'];
    unset($validated['types_of_audiance']);

    // Store the product image
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('product-image', 'public');
    }

    // Create the product
    $product = Product::create($validated);

    // Save audience types in the pivot table
    $product->types()->sync($typeIds);

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product created successfully.');
}
}
