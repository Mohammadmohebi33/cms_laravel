<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;

class PostController extends Controller
{

    public function index(){

        $posts = Post::all() ;
        return view('admin.posts.view_all_posts' , ['posts' => $posts]) ;
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


    public function edit(Post $post){
        return view('admin.posts.edit' , ['post' => $post]) ;
    }


    public function  destroy(Post $post , Request $request){

        $post->delete() ;
        $request->session()->flash('message' , 'Post was deleted')  ;

        return back() ;
    }


    public function update(Post $post  ,Request $request){

        $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  => 'file',
            'body'        => 'required'
        ]);

        if (request('post_image')){
              $post->post_image = $inputs['post_image']  ;
        }

        $post->title  = $inputs['title'] ;
        $post->body   = $inputs['body']  ;

        $post->update() ;
        $request->session()->flash('message' , 'Post was updated')  ;
        return redirect()->route('post.index') ;

    }


}
