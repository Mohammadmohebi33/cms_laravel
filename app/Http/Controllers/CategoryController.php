<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        return view('admin.Category.view_all_category' , ['categorys' => Category::all()]) ;
    }






    public  function  store()
    {
        request()->validate([
            'name' => ['required']
        ]);

        auth()->user()->cats()->create([

            'name' => request('name')   ,
        ]);

        return back() ;
    }






    public function edit(Category $category)
    {
        return view('admin.Category.edit' , ['category' => $category ,]);
    }






    public function update(Category $category)
    {

        $category->name  = request('name') ;
        $category->save() ;

        return redirect(route('cat.index')) ;
    }






    public function destroy(Category $category)
    {
      $category->delete() ;
      return back() ;
    }
}
