<?php


use Illuminate\Support\Facades\Route ;




Route::middleware(['role:Admin' ,   'auth'])->group(function (){


    Route::put('/users/{user}/attach' , 'UserController@attach')->name('users.attach') ;
    Route::put('/users/{user}/detach' , 'UserController@detach')->name('users.detach') ;
    Route::get('/users/{user}/profile' , 'UserController@show')->name('user.profile.show') ;
    Route::get('/users' , 'UserController@index')->name('users.index') ;
    Route::delete('/{user}/destroy' , 'UserController@destroy')->name('user.destroy') ;

});


Route::middleware(['auth',  'permission:profile'])->group(function (){


    Route::put('/users/{user}/update' , 'UserController@update')->name('user.profile.update') ;


});



?>
