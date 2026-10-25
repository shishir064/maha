<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function create(){
        return view('admin.category.create')->with('success','Category created successfully');
    }
    public function store(CategoryRequest $request){
        $validate=$request->validated();
        $path=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $path=$file->store('category-image','public');
            $validate['image']=$path;
        }
        Category::create($validate);
        return view('admin.category.create')->with('success','Category created successfully');
    }

public function index(Request $request)
{
    $categories = Category::query()
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

    return view('admin.category.index', compact('categories'))->with('success','Category created successfully');
}
public function edit( $id){
    $category=Category::find($id);
    return view('admin.category.edit',compact('category'))->with('success','Category updated successfully');

}

public function update(CategoryRequest $request,$id){
    $category = Category::findOrFail($id);
    $validate = $request->validated();
    $path = null;
   
if ($request->hasFile('image')) {
    $path = $request->file('image')->store(
        'category-images',
        'public'
    );

    if ($category->image) {
        Storage::disk('public')->delete($category->image);
    }
}

$validate['image'] = $path ?? $category->image;

    $category->update($validate);
    return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');
}

public function delete($id)
{
    $category = Category::findOrFail($id);

    if ($category->products()->exists()) {
        return redirect()
            ->route('admin.category.index')
            ->with('error', 'Cannot delete this category because products are using it.');
    }

    if ($category->image) {
        Storage::disk('public')->delete($category->image);
    }

    $category->delete();

    return redirect()
        ->route('admin.category.index')
        ->with('success', 'category deleted successfully.');
}

}
