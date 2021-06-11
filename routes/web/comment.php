<?php


use Illuminate\Support\Facades\Route ;

Route::post('/comment/{id}' , 'CommentController@store')->name('comment') ;

