<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class DownloadController extends Controller
{


    public function index($id){



     $post  =   Post::find($id) ;
     $file  =   public_path($post->post_image)   ;


     $headers   =   array([

         'Content-Type: image/jpeg'    ,
     ]) ;


     return Response::download($file    ,   $post->post_image ,   $headers)   ;

    }
}
