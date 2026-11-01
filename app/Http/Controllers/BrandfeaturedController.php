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
 return redirect()->route('admin.brandfeatured.index')->with('success','Brand Featured Added Successfully');
    }
    public function index(){
          $brandfeatureds = Brandfeatured::with('brand')
        ->latest()
        ->get();
        return view('admin.brandfeatured.index',compact('brandfeatureds'));
    }

    public function edit( $id){
        $brandfeatured=Brandfeatured::find($id);
        $brands=Brand::all();
        return view('admin.brandfeatured.edit',compact('brandfeatured','brands'));
    }
   
public function update(Request $request, $id)
{
    $validate = $request->validate([
        'title' => 'required',
        'brand_id' => 'required',
        'product_limit' => 'required|integer|min:1',
        'status' => 'required',
    ]);

    $brandfeatured = Brandfeatured::findOrFail($id);

    $brandfeatured->update($validate);

     return redirect()
        ->route('admin.brandfeatured.index')
        ->with('success', 'Brand Featured Updated Successfully');
}

    public function delete($id){
        $brandfeatured=Brandfeatured::find($id);
        $brandfeatured->delete();
        return redirect()->route('admin.brandfeatured.index')->with('success','Brand Featured Deleted Successfully');
    }
}
