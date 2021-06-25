
<?php


use Illuminate\Support\Facades\Route ;





Route::middleware(['role:Admin' ,   'auth'])->group(function (){


    Route::post('/comment/{id}' , 'CommentController@store')->name('comment') ;
    Route::get('/comments'      ,  'CommentController@index' )->name('all_comment') ;
    Route::put('/acomment/{comment}'  ,   'CommentController@accept')->name('accept')  ;
    Route::put('/dcomment/{comment}'  ,   'CommentController@disable')->name('disable')  ;



});



?>
