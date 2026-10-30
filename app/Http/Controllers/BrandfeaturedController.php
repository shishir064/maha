<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Brandfeatured;
use Illuminate\Http\Request;

class BrandfeaturedController extends Controller
{
    //
    public function create(){
        $brands=Brand::all();
        return view('admin.brandfeatured.create',compact('brands'));
    }

    public function store(request $request){
$validate=$request->validate([
  'title'=>'required',
  'brand_id'=>'required',
  'product_limit'=>'required',
  'status'=>'required',
]);

 Brandfeatured::create($validate);
 return redirect()->route('admin.brandfeatured.create')->with('success','Brand Featured Added Successfully');
    }
}
