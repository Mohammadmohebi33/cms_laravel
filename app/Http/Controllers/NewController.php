<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;

class NewController extends Controller
{


    public function index()
    {
        $news   =   news::all() ;
        return  view('admin.news.view_all_news' ,   ['news' =>  $news])    ;
    }



    public function store(Request $request)
    {

        $input = request()->validate([

            'body'        => 'required'
        ]);

        auth()->user()->news()->create($input)  ;
        return  back()  ;
    }



    public function edit(news $news)
    {


       return   view('admin.news.edit'  ,   ['news' =>  $news]) ;
    }



    public function update(news $news)
    {


        $input = request()->validate([

            'body' => 'required'
        ]);


        $news->update($input)   ;
        return  redirect()->route('allnews')   ;

    }


    public function destory(news $news)
    {
       $news->delete()  ;
       return   back()  ;
    }
}
