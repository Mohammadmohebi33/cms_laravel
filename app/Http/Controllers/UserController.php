<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function  index(){

        $users = User::all() ;
        return view('admin.users.index' ,  ['users' => $users]) ;
    }


    public  function  show(User $user){

        return view('admin.users.profile' , ['user' => $user]) ;
    }



    public  function  update(User $user){


        $input = request()->validate([

            'username' => ['required' , 'string' , 'max:255' , 'alpha_dash'] ,
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avatar'   =>['file']

        ]);

        if (request('avatar')){
            $input['avatar'] =  request('avatar')->store('images') ;
        }

        $user->update($input) ;
        return back() ;
    }


    public function destroy(User $user){

        $user->delete() ;

        return back() ;


    }
}
