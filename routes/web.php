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

Route::group(['middleware' => ['guest']], function () {
    //最初の画面はログイン画面
    Route::get('/', 'AuthController@showLogin')->name('login.show');

    //ログイン処理
    Route::post('login', 'AuthController@login')->name('login');
});


Route::group(['middleware' => ['auth']], function () {
    //一覧画面
    Route::get('list',function() {
        return view('list');
    })->name('list');

    //ログアウト
    Route::post('logout','AuthController@logout')->name('logout');
});