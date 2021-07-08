<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {

        $category = Category::all() ;
        return  view('contact'  ,   ['categorys' =>  $category])     ;


    }



    public function show()

    {

        $contact    =   Contact::all()  ;
        return view('admin.contact.index'   ,   ['contacts'  =>  $contact]) ;
    }



    public function destroy(Contact $contact)
    {

        $contact->delete()  ;
        return  back()  ;
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
