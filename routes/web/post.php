<?php


use Illuminate\Support\Facades\Route ;

Route::get('/post/{post}' , 'PostController@show')->name('post') ;
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::get('/posts/all_post', 'PostController@index')->name('post.index');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::get('/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
Route::put('/posts/{post}/update', 'PostController@update')->name('post.update');


?>
