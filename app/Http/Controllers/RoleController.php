<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{




    public  function  index(){
        return view('admin.role.index', [
            'roles' => Role::all() ,
        ]) ;
    }







    public  function  store(){
        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => request('name')   ,
            'slug' => request('name')
        ]);

        return back() ;
    }







    public function destroy(Role $role){
       $role->delete() ;
       return back() ;
    }






    public function edit(Role $role){
      return view('admin.role.edit' , [
          'role' => $role ,
          'permissions' => Permission::all() ,
      ]);
    }





    public function update(Role $role){
       $role->name  = request('name') ;
       $role->slug  = request('name') ;

       $role->save() ;

       return back() ;
    }



    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back() ;
    }


    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back() ;
    }









}
