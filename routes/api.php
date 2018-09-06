<?php

use Illuminate\Http\Request;

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
/*Route::get('products', function () {
    return 'welcome';
})*/


Route::get('comment', 'CommentController@index');
Route::get('comment/{comment}', 'CommentController@show');
Route::post('comment', 'CommentController@store');
Route::put('comment/{comment}', 'CommentController@update');
Route::delete('comment/{comment}', 'CommentController@delete');






