<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;

class PostController extends Controller
{

    public function index(){

        $posts   = auth()->user()->posts()->paginate(2);
        return view('admin.posts.view_all_posts' , ['posts' => $posts]) ;
    }


    public  function show(Post $post){

        return view('blog-post' , ['post' => $post]) ;
    }


    public  function create(){
        return view('admin.posts.create') ;
    }



    public  function store(){
        $this->authorize('create' , Post::class) ;

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
        $this->authorize('view' , $post) ;
        return view('admin.posts.edit' , ['post' => $post]) ;

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


        $this->authorize('update' , $post) ;

        $post->update() ;
        $request->session()->flash('message' , 'Post was updated')  ;
        return redirect()->route('post.index') ;

    }


    public function  destroy(Post $post , Request $request){

        $this->authorize('delete' , $post) ;
        $post->delete() ;
        $request->session()->flash('message' , 'Post was deleted')  ;

        return back() ;
    }


}
