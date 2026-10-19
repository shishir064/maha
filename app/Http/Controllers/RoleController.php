<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        return view('admin.roles.create');
    }
    public function store(request $request){
        //
          $validate=$request->validate([
            'name'=>'required|unique:roles,name',
        ]);
        Role::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);
return redirect()->route('admin.roles.index');
    }

    public function show($id){
        $user=User::find($id);
        $roles=Role::all();
        return view('admin.roles.show',compact('roles','user'));
    }

   
 
public function assign(Request $request, $id)
{
    $user = User::findOrFail($id);

    $role = Role::findById($request->role_id); // convert ID → Role

    $user->syncRoles([$role->name]); // assign role properly

    return redirect()->route('admin.users.index');
}
    }


