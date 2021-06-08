<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(User $user){

        return view('admin.profile.my_profile' , ['user' => $user]) ;
    }
}
