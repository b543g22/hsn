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
    Route::get('/',function() {
        return view('login_form');
    })->name('login.show');

    //ログイン処理
    Route::post('login', 'AuthController@exeLogin')->name('login.exe');

    //ユーザ登録画面表示
    Route::get('userCreate',function() {
        return view('userCreate');
    })->name('userCreate.show');

    //ユーザ登録処理
    Route::post('userStore','AuthController@exeUserStore')->name('userStore.exe');
});


Route::group(['middleware' => ['auth']], function () {
    //一覧画面
    Route::get('list',function() {
        return view('hsn.list');
    })->name('list.show');

    //ログアウト
    Route::post('logout','AuthController@exeLogout')->name('logout.exe');
});