<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //
    public function index(){
        $permissions=Permission::all();
        return view('admin.permissions.index',compact('permissions'));
    }
    public function create(){
        return view('admin.permissions.create');
    }
    public function store(request $request){
        //
        $validate=$request->validate([
            'name'=>'required|unique:roles,name',
        ]);
        Permission::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);
        return redirect()->route('admin.permissions.index');
    }

    public function show($id){
        $role=Role::findorFail($id);
        $permissions=Permission::all();
        return view('admin.permissions.show',compact('permissions','role'));
    }

       public function assign(request $request,$id){
        $role=Role::find($id);
        $role->syncPermissions($request->permissions??[]);
        return redirect()->route('admin.roles.index');
    }
}
