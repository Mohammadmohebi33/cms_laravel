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

        $comments   =   Comment::count()    ;
        $posts      =   Post::count()   ;
        $users      =   User::count()   ;
        $category   =   Category::count()   ;





        return  view('admin.charts.charts'  ,   [

            'comments'  =>  $comments   ,
            'posts'     =>  $posts  ,
            'users'     =>  $users  ,
            'category'  =>  $category

        ]) ;
    }
}
