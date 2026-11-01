<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Categoryfeatured;
use Illuminate\Http\Request;

class CategoryfeaturedController extends Controller
{
    //
    public function create()
    {
        $categories = Category::all();
        return view('admin.categoryfeatured.create', compact('categories'));
    }

    public function store(Request $request)
    {
    $validate = $request->validate([
      'title' => 'required',
      'category_id' => 'required',
      'product_limit' => 'required',
      'status' => 'required',
    ]);

    Categoryfeatured::create($validate);
    return redirect()->route('admin.categoryfeatured.index')->with('success', 'Category Featured Added Successfully');
    }

    public function index()
    {  
         $categoryfeatureds = Categoryfeatured::with('category')
        ->latest()
        ->get();

        return view('admin.categoryfeatured.index', compact('categoryfeatureds'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $categoryfeatured = Categoryfeatured::find($id);
        return view('admin.categoryfeatured.edit', compact('categoryfeatured','categories'));
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'product_limit' => 'required',
            'status' => 'required',
        ]);

        $categoryfeatured = Categoryfeatured::findOrFail($id);

        $categoryfeatured->update($validate);

         return redirect()
            ->route('admin.categoryfeatured.index')
            ->with('success', 'Category Featured Updated Successfully');
    }
    public function delete($id){
        $categoryfeatured=Categoryfeatured::find($id);
        $categoryfeatured->delete();
        return redirect()->route('admin.categoryfeatured.index')->with('success','Category Featured Deleted Successfully');
    }



}
