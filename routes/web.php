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
    //曲一覧画面
    Route::get('/list','HsnController@showList')->name('list.show');
    //曲詳細画面
    Route::get('/list/{song_id}','HsnController@showDetail')->name('detail.show');
    //曲編集画面
    Route::get('/list/{song_id}/edit','HsnController@showEdit')->name('edit.show');
    //曲削除処理
    Route::get('/list/{song_id}/delete','HsnController@exeSongDelete')->name('songDelete.exe');
    //曲更新処理
    Route::post('/songUpdate','HsnController@exeUpdate')->name('update.exe');
    //曲登録画面
    Route::get('/songCreate', 'HsnController@showSongCreate')->name('songCreate.show');
    //曲登録処理
    Route::post('/songStore','HsnController@exeSongStore')->name('songStore.exe');
    //音楽予測検索処理
    Route::post('/list/index','HsnController@getSongSearch')->name('songSearch.get');

    //アーティスト一覧画面
    Route::get('/artist','HsnController@showArtistList')->name('artistList.show');
    //アーティスト詳細画面
    Route::get('/artist/{artist_id}','HsnController@showArtistDetail')->name('artistDetail.show');
    //アーティスト編集画面
    Route::get('/artist/{artist_id}/edit','HsnController@showArtistEdit')->name('artistEdit.show');
    //アーティスト削除処理
    Route::get('/artist/{artist_id}/delete','HsnController@exeArtistDelete')->name('artistDelete.exe');
    //アーティスト更新処理
    Route::post('/artistUpdate','HsnController@exeArtistUpdate')->name('artistUpdate.exe');
    //アーティスト登録画面
    Route::get('/artistCreate',function() {
        return view('hsn.artistCreate');
    })->name('artistCreate.show');
    //アーティスト登録処理
    Route::post('/artistStore','HsnController@exeArtistStore')->name('artistStore.exe');

    //アーティスト予測検索処理
    Route::post('/artistList/index','HsnController@getArtistSearch')->name('artistSearch.get');

    //ログアウト
    Route::post('logout','AuthController@exeLogout')->name('logout.exe');
});