<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{



    public  function  index(){
        return view('admin.permission.index' , ['permissions' => Permission::all()]) ;
    }



    public  function  destroy(Permission $permission){
       $permission->delete() ;
       return back() ;
    }




    public  function  store(){
        request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => request('name')   ,
            'slug' => request('name')
        ]);

        return back() ;
    }





    public function edit(Permission $permission){
        return view('admin.permission.edit' , [
            'permission' => $permission ,
            'roles' => Role::all() ,
        ]);
    }



    public function update(Permission $permission){
        $permission->name  = request('name') ;
        $permission->slug  = request('name') ;

        $permission->save() ;

        return back() ;
    }





    public function attach_role(Permission $permission){
        $permission->roles()->attach(request('role'));
        return back() ;
    }


    public function detach_role(Permission $permission){
        $permission->roles()->detach(request('role'));
        return back() ;
    }







}
