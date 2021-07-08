<?php

namespace App\Http\Controllers;

use App\Category;
use App\news;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $posts   = Post::where('accept' ,   1)->get()   ;
        $category = Category::all() ;
        $news   =  news::orderBy('created_at'   ,   'desc')->take(3)->get();

        return view('home'  , ['posts' => $posts , 'categorys' => $category ,   'news'  =>  $news]);
    }


    public function index_category(Category  $category)
    {

       $posts = $category->post ;
       $category = Category::all() ;
       return view('home'  , ['posts' => $posts , 'categorys' => $category]);



    }
}
