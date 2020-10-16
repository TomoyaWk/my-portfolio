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
Route::get('post/{id}', 'Api\PostController@show');  //個別記事ページ表示

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('post', 'Api\PostController@index'); //全件表示
    Route::post('post', 'Api\PostController@store'); //
    Route::get('post/create', 'Api\PostController@create');
    Route::post('post/{id}', 'Api\PostController@update');
    Route::delete('post/{id}', 'Api\PostController@delete');
});
