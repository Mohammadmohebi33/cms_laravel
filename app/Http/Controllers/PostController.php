<?php

namespace App\Http\Controllers;


use App\Category;
use App\Comment;
use App\news;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends ImageController
{



    public function index()
    {
        $posts   = auth()->user()->posts()->paginate(5);
        return view('admin.posts.view_all_posts' , ['posts' => $posts]) ;
    }





    public  function show(Post $post)
    {
        $categorys = Category::all() ;
        return view('blog-post' , ['post' => $post , 'categorys' => $categorys]) ;
    }





    public  function create()
    {
        return view('admin.posts.create') ;
    }





    public  function store()
    {
       // $this->authorize('create' , Post::class) ;

         $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  => 'required|file',
            'body'        => 'required'
        ]);


         $imageurl =  $this->uploadImage(request()->file('post_image')) ;
         auth()->user()->posts()->create(array_merge(request()->all()   ,   ['post_image'   =>  $imageurl])) ;
         return back()->with('create' , 'post was created') ;
    }





    public function edit(Post $post)
    {
        $this->authorize('view' , $post) ;
        $categorys = Category::all() ;
        return view('admin.posts.edit' , ['post' => $post , 'categorys' => $categorys]) ;
    }




    public function update(Post $post  ,Request $request)
    {

        $this->authorize('update' , $post) ;
        $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  =>'image|max:10000|mimes:doc,docx,png,jpg' ,
            'body'        => 'required'
        ]);

        $imageurl  = $post->post_image ;
        $inputs['post_image'] = $imageurl ;


        if ($request->hasFile('post_image')){

            $imageurl =  $this->uploadImage(request()->file('post_image')) ;
            unlink('storage/images/'.$post->post_image) ;
        }

        $post->update(array_merge($request->all()   ,   ['post_image'   =>  $imageurl])) ;
       // $request->session()->flash('message' , 'Post was updated')  ;
        return redirect()->route('post.index')->with('edit' , 'post updated') ;

    }





    public function  destroy(Post $post , Request $request)
    {
        $this->authorize('delete' , $post) ;
        unlink('storage/images/'.$post->post_image) ;
        $post->delete() ;
     //   $request->session()->flash('message' , 'Post was deleted')  ;
        return back()->with('delete' , 'post deleted') ;
    }



    public function attach(Post $post)
    {
     $post->category()->attach(request('category'));
     return back()->with('edit' , 'add category ') ;
    }



    public function detach(Post $post)
    {
        $post->category()->detach(request('category'))  ;
        return back()->with('delete' , 'remove category') ;
    }






















}
