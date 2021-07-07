<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {
       return   view('admin.message.index'  ,   [
           'users'    =>  User::all()   ,
           'messages' =>  Message::where('to', auth()->user()->id)->get() ,
       ])     ;
    }






    public function store(Request $request)
    {
        $input = $request->validate([

            'message'        => 'required',
            'to'          => 'required',
        ]);


        auth()->user()->message()->create($input)  ;
        return back()   ;

    }







    public function destroy(Message $message)
    {
       $message->delete()   ;
       return   back()  ;
    }
}
