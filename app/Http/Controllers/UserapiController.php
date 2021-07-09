<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserapiController extends Controller
{


    public function index()
    {

        return  User::all() ;
    }




    public function findbyid(User $user)
    {

        return  $user   ;
    }




    public function store(Request $request)
    {
        $data   =   $request->all() ;
        User::create($data) ;

        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;
    }



    public function destroy(User $user)
    {
        $user->delete() ;
        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;

    }




    public function update(User $user   ,   Request $request)
    {

        $user->update($request->all())  ;
        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;
    }
}
