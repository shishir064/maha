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
    return redirect()->route('admin.categoryfeatured.create')->with('success', 'Category Featured Added Successfully');
    }


}
