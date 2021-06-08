<?php


use Illuminate\Support\Facades\Route ;




Route::get('/myprofile/{user}' , 'ProfileController@index')->name('profile') ;

?>

