<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function index(User $user)
    {
        return view('admin.profile.my_profile' , ['user' => $user]) ;
    }


    public function show(User $user)
    {

        $categorys = Category::all() ;
        return  view('profile'  ,   ['users'     =>     $user       ,   'categorys' => $categorys]) ;
    }
}
