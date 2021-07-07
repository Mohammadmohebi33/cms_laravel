<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function index(Request $request)

    {
        $search =   $request->input('search')   ;
        $posts  =   Post::query()->where('title'    ,   'LIKE'  ,   "%{$search}%")->get()   ;
        $categorys = Category::all() ;

        return  view('home' ,   ['posts'    =>  $posts  ,   'categorys' => $categorys])    ;

    }
}
