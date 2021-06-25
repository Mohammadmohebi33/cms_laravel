<?php


use Illuminate\Support\Facades\Route ;




Route::middleware(['auth',  'permission:profile'])->group(function (){


    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts', 'PostController@store')->name('post.store');
    Route::get('/posts/all_post', 'PostController@index')->name('post.index');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
    Route::delete('/posts/{post}/destroy', 'PostController@destroy')->name('post.destroy');
    Route::put('/posts/{post}/update', 'PostController@update')->name('post.update');
    Route::put('/posts/{post}/attach' , 'PostController@attach')->name('post.attach');
    Route::put('/posts/{post}/detach' , 'PostController@detach')->name('post.detach')   ;


});



?>
