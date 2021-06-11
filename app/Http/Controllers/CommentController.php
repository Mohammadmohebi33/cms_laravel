<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

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

}
