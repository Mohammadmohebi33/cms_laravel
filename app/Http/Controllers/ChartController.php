<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{

    public function index()
    {

       // $comments   =   Comment::count()    ;
        $comments_ok  =   Comment::where('accept' , 1)->get()->count() ;
        $comments_no  =   Comment::where('accept' , 0)->get()->count() ;
        $posts      =   Post::count()   ;
        $users      =   User::count()   ;
        $category   =   Category::count()   ;





        return  view('admin.charts.charts'  ,   [

            'comments_ok'  =>  $comments_ok   ,
            'comments_no'  =>  $comments_no   ,
            'posts'        =>  $posts  ,
            'users'        =>  $users  ,
            'category'     =>  $category

        ]) ;
    }
}
