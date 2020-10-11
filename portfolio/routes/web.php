<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin'); //投稿画面表示 

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*'); //初期画面表示 
