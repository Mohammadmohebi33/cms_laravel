<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){

        return view('admin.posts.view_all_posts') ;
    }


    public  function show(Post $post){

        return view('blog-post' , ['post' => $post]) ;
    }


    public  function create(){

        return view('admin.posts.create') ;
    }



    public  function store(){

         $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  => 'file',
            'body'        => 'required'
        ]);

         if (request('post_image')){
             $inputs['post_image']  = request('post_image')->store('images') ;
         }

         auth()->user()->posts()->create($inputs) ;
         return back() ;
    }


}
