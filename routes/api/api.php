<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route    ;
use App\Http\Controllers\api\PostapiController  ;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts' ,   'PostapiController@index')    ;
Route::get('/post/{post}' ,   'PostapiController@findbyid')  ;
Route::post('/post/create'   ,   'PostapiController@store')   ;
Route::delete('/post/delete/{post}' ,   'PostapiController@destroy')  ;
Route::put('post/update/{post}'     ,   'PostapiController@update')    ;
