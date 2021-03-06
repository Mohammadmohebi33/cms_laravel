<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route ;




Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/{category}' , 'HomeController@index_category')->name('home.category')  ;
Route::get('articles/post/{post}' , 'PostController@show')->name('post') ;


Route::get('/search'    ,   'SearchController@index')->name('search')   ;


Route::middleware(['role:Admin' ,   'auth'])->group(function (){
    Route::get('/admin/charts'  ,   'ChartController@index')->name('charts')    ;
});




Route::get('/profile/{user}'  ,   'ProfileController@show')->name('showprofile')  ;



Route::get('/d/{id}'    ,     'DownloadController@index')->name('g')   ;





Route::middleware('auth')->group(function (){
    Route::get('/admin', 'AdminController@index')->name('admin.index');
});

