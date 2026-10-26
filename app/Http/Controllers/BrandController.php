<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //
      public function create(){
        return view('admin.brand.create');
    }
    public function store(BrandRequest $request){
        $validate=$request->validated();
        $path=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('brand-image','public');
            $validate['image']=$path;
        }
        Brand::create($validate);
        return redirect()->route('admin.brand.index')->with('success','Brand created successfully');
    }

    public function index(Request $request)
{
    $brands = Brand::query()
        ->when($request->filled('search'), function ($query) use ($request) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->paginate(10);

    return view('admin.brand.index', compact('brands'));
}

public function edit( $id){
    $brand=Brand::find($id);
    return view('admin.brand.edit',compact('brand'));

}

public function update(BrandRequest $request,$id){
   $brand = Brand::findOrFail($id);
$validate = $request->validated();

$path = null;

if ($request->hasFile('image')) {
    $path = $request->file('image')->store(
        'brand-images',
        'public'
    );

    if ($brand->image) {
        Storage::disk('public')->delete($brand->image);
    }
}

$validate['image'] = $path ?? $brand->image;

$brand->update($validate);

return redirect()
    ->route('admin.brand.index')
    ->with('success', 'Brand updated successfully.');

}

public function delete($id)
{
    $brand = Brand::findOrFail($id);

    if ($brand->products()->exists()) {
        return redirect()
            ->route('admin.brand.index')
            ->with('error', 'Cannot delete this brand because products are using it.');
    }

    if ($brand->image) {
        Storage::disk('public')->delete($brand->image);
    }

    $brand->delete();

    return redirect()
        ->route('admin.brand.index')
        ->with('success', 'Brand deleted successfully.');
}
}