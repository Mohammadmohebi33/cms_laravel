<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostapiController extends Controller
{




    public function index()
    {

        return  Post::all() ;

    }




    public function findbyid(Post $post)
    {

        return  $post   ;
    }




    public function store(Request $request)
    {
        $data   =   $request->all() ;
        Post::create($data) ;

        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;
    }





    public function destroy(Post $post)
    {
        $post->delete() ;
        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;

    }




    public function update(Post $post   ,   Request $request)
    {

        $post->update($request->all())  ;
        return  response(['message' =>  'عملیات انجام شد']  ,   202)    ;
    }
}
