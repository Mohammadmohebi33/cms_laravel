<?php

use Illuminate\Support\Facades\Route;




Route::middleware(['auth' , 'permission:profile'])->group(function (){


    Route::get('/news'       ,   'NewController@index')->name('allnews') ;
    Route::post('/news'      ,   'NewController@store')->name('create_news') ;
    Route::delete('/news/{news}'    ,   'NewController@destory')->name('delete_new') ;
    Route::get('/updatenew/{news}'   ,  'NewController@edit')->name('updatenew')  ;
    Route::put('/update/{news}'   ,   'NewController@update')->name('upgrade')  ;

});



?>
