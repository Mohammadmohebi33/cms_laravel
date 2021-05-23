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
use Illuminate\Support\Facades\Route ;




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{post}' , 'PostController@show')->name('post') ;

Route::middleware('auth')->group(function (){

    Route::get('/admin', 'AdminController@index')->name('admin.index') ;
    Route::get('/admin/posts/create', 'PostController@create')->name('post.create') ;
    Route::post('/admin/posts/', 'PostController@store')->name('post.store') ;
    Route::get('/admin/posts/all_post', 'PostController@index')->name('post.index') ;

});
