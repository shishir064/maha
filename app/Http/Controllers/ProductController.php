<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductRequet;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    // Get audience type IDs
    $typeIds = $validated['types_of_audiance'];
    unset($validated['types_of_audiance']);

    // Get uploaded images and primary image index
    $images = $request->file('images');
    $primaryIndex = (int) $validated['primary_image_index'];

    // Remove fields that are not product table columns
    unset(
        $validated['images'],
        $validated['primary_image_index']
    );

    // Generate slug
    $validated['slug'] = Str::slug($validated['name']);

    // Create product
    $product = Product::create($validated);

    // Save audience types
    $product->types()->sync($typeIds);

    // Save product images
    foreach ($images as $index => $image) {

        $path = $image->store('product-image', 'public');

        $product->images()->create([
            'image' => $path,
            'is_primary' => $index === $primaryIndex,
            'sort_order' => $index,
        ]);
    }

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product created successfully.');
}


public function edit($id){
    $product=Product::find($id);
    $brands = Brand::all();
    $types = Types::all();
    $categories = Category::all();
    return view('admin.products.edit',compact('product','brands','categories','types'));

}


public function update(ProductRequet $request, $id)
{
    $validated = $request->validated();

    $product = Product::findOrFail($id);

    $validated['slug'] = Str::slug($validated['name']);

    // Handle image upload
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store(
            'product-images',
            'public'
        );

        // Delete old image
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $validated['image'] = $path??$product->image;
    }

    // Update product fields
    $product->update($validated);

    // Update multiple audience types
    $product->types()->sync(
        $validated['types_of_audiance'] ?? []
    );

    return redirect()
        ->route('admin.products.index')
        ->with('success', 'Product updated successfully.');
}

public function delete($id){
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');

}

public function details(Product $product)
{
    $product->load(['brand', 'category']);
    $relatedproducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();

    return view('pages.products-details', compact('product','relatedproducts'));
}

}
