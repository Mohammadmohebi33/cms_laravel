<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{

    public function  index(){

        $users = User::all() ;
        return view('admin.users.index' ,  ['users' => $users]) ;
    }


    public  function  show(User $user){

        return view('admin.users.profile' , [


            'user' => $user ,
            'roles'=> Role::all()  ,

        ]) ;
    }



    public  function  update(User $user , Request $request){



        $input = request()->validate([

            'username' => 'required|string|max:255|alpha_dash' ,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'avatar'   =>'image|max:10000|mimes:doc,docx,png,jpg' ,
            'cv'    =>  'required'  ,

        ]);

        $file_name  = $user->avatar ;


        $file = $request->file('avatar') ;

        if ($request->hasFile('avatar')) {

            if (is_file($user->avatar)) {
                unlink('storage/images/' . $user->avatar);
            }

            $file_name = time()."-".$file->getClientOriginalName();
            $path = public_path('/storage/images');
            $file->move($path, $file_name);
            Image::configure(array('driver' => 'gd'));
            $img = Image::make($path . '/' . $file_name)->resize(100, 100);


            $img->save($path . '/' . $file_name);


        }

        $input['avatar'] =  $file_name ;


        $user->update($input) ;
        return back() ;
    }





    public function destroy(User $user){

        $user->delete() ;

        return back() ;

    }


    public function attach(User $user){


       $user->roles()->attach(request('role'));

       return back() ;
    }



    public function detach(User $user){

        $user->roles()->detach(request('role'));

        return back() ;
    }
}
