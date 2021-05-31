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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/list', 'Api\PostController@list'); //blogページ一覧表示
Route::get('/post/{id}', 'Api\PostController@show');  //個別記事ページ表示

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('post', 'Api\PostController@index'); //全件表示
    Route::post('post/create', 'Api\PostController@create');
    Route::get('post/edit/{id}', 'Api\PostController@edit');
    Route::post('post/{id}', 'Api\PostController@update');
    Route::post('post/upload/img', 'Api\PostController@uploadImg');
    Route::get('post/delete/{id}', 'Api\PostController@destroy');
});
