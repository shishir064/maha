<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    //
      public function index(){
        $types=Types::paginate(5);
        return view('admin.types.index',compact('types'));
    }
    public function create(){
        return view('admin.types.create');
    }

    public function store(TypeRequest $request){
        $validate=$request->validated();
        Types::create($validate);
        return view('admin.types.create');
    }

    public function delete($id){
$types=Types::find($id);
    if ($types->products()->exists()) {
        return redirect()
            ->route('admin.types.index')
            ->with('error', 'Cannot delete this brand because products are using it.');
    }
$types->delete();
return redirect()->route('admin.types.index');
    }
}
