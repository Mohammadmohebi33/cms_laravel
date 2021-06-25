<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function index()
    {
        $comments   =   Comment::all()  ;
        return  view('admin.comments.all_comments'      ,   ['comments' =>  $comments]) ;
    }





    public  function store(Request $request  , $id){


        $inputs = request()->validate([
            'comment' => 'required'
        ]);

        $input = request()->all() ;
        $input['user_id'] = auth()->user()->id ;
        $input['post_id'] = $id ;
        Comment::create($input) ;
        return back()  ;

    }




    public function accept(Comment $comment)
    {
       $comment->accept =   true    ;
       $comment->update()   ;
       return   back()  ;
    }


    public function disable(Comment $comment)
    {
        $comment->accept    =   false   ;
        $comment->update();
        return  back();
    }

}
