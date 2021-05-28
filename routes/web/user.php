<?php


use Illuminate\Support\Facades\Route ;



Route::middleware('auth')->group(function (){

    Route::put('/users/{user}/update' , 'UserController@update')->name('user.profile.update') ;
    Route::delete('/{user}/destroy' , 'UserController@destroy')->name('user.destroy') ;
});





Route::middleware('role:Admin')->group(function (){
    Route::get('/users' , 'UserController@index')->name('users.index') ;
});





Route::middleware(['auth' , 'can:view,user'])->group(function (){
    Route::get('/users/{user}/profile' , 'UserController@show')->name('user.profile.show') ;
});

?>
