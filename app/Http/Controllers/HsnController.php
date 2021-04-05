<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\ArtistUpdateRequest;
use App\Models\Song;
use App\Models\Artist;

class HsnController extends Controller {
    /**
     * 曲一覧画面表示
     * 
     * @return view
     */
    public function showList() {
        $list = Song::getShowList();
        return view('hsn.list',[
            'lists' => $list
            ]);
    }

    /**
     * 曲詳細画面表示
     * 
     * @param int $song_id
     * @return view
     */
    public function showDetail(int $song_id){
        $list = Song::getShowDetail($song_id);
        if(is_null($list)) {
            return redirect()
                ->route('list.show')
                ->with('err_msg',config('const.no_data'));
        }
        return view('hsn.detail',[
            'list' => $list]);
    }
    
    /**
     * 曲編集画面表示
     * 
     * @param int $song_id
     * @return view
     */
    public function showEdit(int $song_id) {
        $list = Song::getShowDetail($song_id);
        $artists = Artist::all();

        if(is_null($list)) {
            return redirect()
                ->route('list.show')
                ->with('err_msg',config('const.no_data'));
        }
        return view('hsn.edit',[
            'list' => $list
            ],[
            'artists' => $artists
            ]);
        
    }

    /**
     * 曲更新処理
     * 
     * @param UpdateRequest $request
     * @return view
     */
    public function exeUpdate(UpdateRequest $request) {
        
        // 更新データを受け取る
        $inputs = $request->all();
        Song::exeUpdate($inputs);
        return redirect()
            ->route('detail.show',[
                'song_id' => $inputs['song_id']
            ])->with('update_success',config('const.songUpdate_success'));
    }

    /**
     * 曲登録画面表示
     * 
     * @return view
     */
    public function showSongCreate() {
        $artists = Artist::all();
  
        if(count($artists) <= 0) {
            return redirect()
                ->route('list.show')
                ->with('err_msg',config('const.no_artist'));
        }
        return view('hsn.songCreate',[
            'artists' => $artists
            ]);
    }

    /**
     * 曲登録処理
     * 
     * @param UpdateRequest $request
     * @return view
     */
    public function exeSongStore(UpdateRequest $request) {
        $inputs = $request->all();
        Song::exeStore($inputs);
        return redirect()
            ->route('list.show')
            ->with('success_msg',config('const.songCreate_success'));
    }

    /**
     * 曲削除処理
     * 
     * @param int $song_id
     * @return view
     */
    public function exeSongDelete(int $song_id) {
        Song::exeDelete($song_id);
        return redirect()
            ->route('list.show')
            ->with('success_msg',config('const.songDelete_success'));
    }

    /**
     * アーティスト一覧画面表示
     * 
     * @return view
     */
    public function showArtistList() {
        $list = Artist::showList();
        return view('hsn.artistList',[
            'lists' => $list
            ]);
    }

    /**
     * アーティスト詳細画面表示
     * 
     * @param int artist_id
     * @return view
     */
    public function showArtistDetail(int $artist_id) {
        $artist = Artist::showDetail($artist_id);
        if(is_null($artist)) {
            return redirect()
                ->route('artistList.show')
                ->with('error_msg',config('const.no_data'));
        }
        return view('hsn.artistDetail',[
            'artist' => $artist
            ]);
    }

    /**
     * アーティスト編集画面表示
     * 
     * @param artist_id
     * @return view
     */
    public function showArtistEdit(int $artist_id) {
        $artist = Artist::showDetail($artist_id);
        if(is_null($artist)) {
            return redirect()
                ->route('artistList.show')
                ->with('error_msg',config('const.no_data'));
        }
        return view('hsn.artistEdit',[
            'artist' => $artist
            ]);
    }

    /**
     * アーティスト更新処理
     * 
     * @param ArtistUpdateRequest $request 
     * @return view
     */
    public function exeArtistUpdate(ArtistUpdateRequest $request) {
        $inputs = $request->all();
        if(!empty($inputs['artist_image'])) {
            Artist::exeUpdate($inputs);
        } else {
            Artist::exeUpdateImg($inputs);
        }
        return redirect()
            ->route('artistDetail.show',[
                'artist_id' => $inputs['artist_id']
            ])->with('update_success',config('const.artistUpdate_success'));
    }
    
    /**
     * アーティスト登録処理
     * 
     * @param ArtistUpdateRequest $request
     * @return view
     */
    public function exeArtistStore(ArtistUpdateRequest $request) {
        $inputs = $request->all();
        Artist::exeStore($inputs);
        return redirect()
            ->route('artistList.show')
            ->with('success_msg',config('const.artistCreate_success'));
    }

    /**
     * アーティスト削除処理
     * 
     * @param int $artist_id
     * @return view
     */
    public function exeArtistDelete(int $artist_id) {
        $songs = Song::artistSong($artist_id);
        if(count($songs) > 0) {
            return redirect()
            ->route('artistDetail.show',[
                'artist_id' => $artist_id
            ])->with('err_msg',config('const.artistDelete_error'));
        }
        Artist::exeDelete($artist_id);
        return redirect()
        ->route('artistList.show')
        ->with('success_msg',config('const.artistDelete_success'));
    }
}
