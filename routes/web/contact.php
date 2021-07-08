<?php


use Illuminate\Support\Facades\Route    ;



Route::get('contact'    , 'ContactController@index')->name('contact')   ;
Route::post('contact'   ,   'ContactController@store')->name('create_contact')  ;

