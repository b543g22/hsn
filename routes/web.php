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

//最初の画面はログイン画面
Route::get('/', 'AuthController@showLogin')->name('showLogin');

//ログイン処理
Route::post('login', 'AuthController@login')->name('login');