<?php


use Illuminate\Support\Facades\Route    ;



Route::get('messages'   ,   'MessageController@index')->name('message.index')   ;
Route::post('message'   ,   'MessageController@store')->name('message.store')   ;



