<?php


use Illuminate\Support\Facades\Route ;





Route::get('/all_category' , 'CategoryController@index')->name('cat.index') ;
Route::post('/category' , 'CategoryController@store')->name('cat.store') ;
Route::delete('/category/{category}/destroy' , 'CategoryController@destroy')->name('category.destroy') ;
Route::get('/category/{category}/edit' , 'CategoryController@edit')->name('cat.edit') ;
Route::put('/category/{category}/update' , 'CategoryController@update')->name('category.update');


?>
