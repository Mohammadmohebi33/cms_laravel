<?php


use Illuminate\Support\Facades\Route    ;



Route::get('contact'    , 'ContactController@index')->name('contact')   ;
Route::post('contact'   ,   'ContactController@store')->name('create_contact')  ;

Route::get('all_contact'    ,  'ContactController@show')->name('show_contact')  ;
Route::delete('delete_contact/{contact}'    ,  'ContactController@destroy')->name('desryoy_contact')    ;
