<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {

        $category = Category::all() ;
        return  view('contact'  ,   ['categorys' =>  $category])     ;


    }


    public function store(Request $request)
    {
        //dd($request->all());
        $inputs = request()->validate([
            'title'       => 'required|min:8|max:25' ,
            'body'        => 'required'
        ]);



        auth()->user()->contact()->create($inputs)  ;
        return  back()  ;
    }
}
