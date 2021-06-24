<?php

namespace App\Http\Controllers;


use App\Category;
use App\Comment;
use App\news;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{




    public function index(){

        $posts   = auth()->user()->posts()->paginate(5);

        return view('admin.posts.view_all_posts' , ['posts' => $posts]) ;
    }






    public  function show(Post $post){

        $categorys = Category::all() ;
        return view('blog-post' , ['post' => $post , 'categorys' => $categorys]) ;
    }







    public  function create(){
        return view('admin.posts.create') ;
    }








    public  function store(){
        $this->authorize('create' , Post::class) ;

         $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  => 'required|file',
            'body'        => 'required'
        ]);

         if (request('post_image')){

             $file = request()->file('post_image') ;
             $filename = time()."-".$file->getClientOriginalName();
             $path = public_path('/storage/images') ;
             $file->move($path , $filename);

             Image::configure(array('driver' => 'gd'));
             $img = Image::make($path.'/'.$filename)->resize(300, 200);
             $img->save($path.'/'.$filename);
             $inputs['post_image'] = $filename ;

         }

         auth()->user()->posts()->create($inputs) ;
         return back() ;
    }









    public function edit(Post $post){

        $this->authorize('view' , $post) ;
        $categorys = Category::all() ;
        return view('admin.posts.edit' , ['post' => $post , 'categorys' => $categorys]) ;
    }








    public function update(Post $post  ,Request $request){

        $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'post_image'  =>'image|max:10000|mimes:doc,docx,png,jpg' ,
            'body'        => 'required'
        ]);

        $file_name  = $post->post_image ;
        $inputs['post_image'] = $file_name ;

        $file = $request->file('post_image') ;

        if ($request->hasFile('post_image')){

            unlink('storage/images/'.$post->post_image) ;

            $file_name = time()."-".$file->getClientOriginalName();
            $path = public_path('/storage/images') ;
            $file->move($path , $file_name);
            Image::configure(array('driver' => 'gd'));
            $img = Image::make($path.'/'.$file_name)->resize(300, 200);


            $img->save($path.'/'.$file_name);
            $inputs['post_image'] = $file_name ;

        }

        $post->title  = $inputs['title'] ;
        $post->body   = $inputs['body']  ;
        $post->post_image = $inputs['post_image'] ;



        $this->authorize('update' , $post) ;

        $post->update() ;
        $request->session()->flash('message' , 'Post was updated')  ;
        return redirect()->route('post.index') ;

    }









    public function  destroy(Post $post , Request $request){

        $this->authorize('delete' , $post) ;
        unlink('storage/images/'.$post->post_image) ;
        $post->delete() ;
        $request->session()->flash('message' , 'Post was deleted')  ;

        return back() ;
    }









    public function attach(Post $post){


     $post->category()->attach(request('category'));
       // $user->roles()->attach(request('role'));

       return back() ;
    }



    public function detach(Post $post){

        $post->category()->detach(request('category'));


        return back() ;
    }






















}
