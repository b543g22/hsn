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
        $list = Artist::select()
        ->join('songs','songs.artist_id','=','artists.artist_id')
        ->get();

        return view('hsn.list',['lists' => $list]);
    }

    /**
     * 曲詳細画面表示
     * 
     * @param int $song_id
     * @return view
     */
    public function showDetail($song_id){
        $list = Artist::select()
        ->join('songs','songs.artist_id','=','artists.artist_id')
        ->where('songs.song_id','=',$song_id)
        ->first();
        if(is_null($list)) {
            return redirect()->route('list.show')->with('err_msg','データがありません');
        }
        return view('hsn.detail',['list' => $list]);
    }
    
    /**
     * 曲編集画面表示
     * 
     * @param int $song_id
     * @return view
     */
    public function showEdit($song_id) {
        $list = Artist::select()
        ->join('songs','songs.artist_id','=','artists.artist_id')
        ->where('songs.song_id','=',$song_id)
        ->first();
        $artists = Artist::all();

        if(is_null($list)) {
            return redirect()->route('list.show')->with('err_msg','データがありません');
        }
        return view('hsn.edit',['list' => $list],['artists' => $artists]);
        
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

        \DB::beginTransaction();
        try {
            //songsテーブル更新
            $song = Song::find($inputs['song_id']);
            $song->fill([
                'song_title' => $inputs['title'],
                'lyrics' => $inputs['lyrics'],
                'artist_id' => $inputs['artist_id']
            ]);
            $song->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect()->route('detail.show',['song_id' => $inputs['song_id']])->with('update_success','曲情報を更新しました');
    }

    /**
     * 曲登録画面表示
     * 
     * @return view
     */
    public function showSongCreate() {
        $artists = Artist::all();
        dd($artists);
        if(is_null($artists)) {
            return redirect()->route('list.show')->with('err_msg','アーティストが登録されていません');
        }
        return view('hsn.songCreate',['artists' => $artists]);
    }

    /**
     * アーティスト一覧画面表示
     * 
     * @return view
     */
    public function showArtistList() {
        $list = Artist::all();
        
        return view('hsn.artistList',['lists' => $list]);
    }

    /**
     * アーティスト詳細画面表示
     * 
     * @param artist_id
     * @return view
     */
    public function showArtistDetail($artist_id) {
        $artist = Artist::select()
                ->where('artist_id','=',$artist_id)
                ->first();
        if(is_null($artist)) {
            return redirect()->route('artistList.show')->with('error_msg','データがありませんでした');
        }

        return view('hsn.artistDetail',['artist' => $artist]);
    }

    /**
     * アーティスト編集画面表示
     * 
     * @param artist_id
     * @return view
     */
    public function showArtistEdit($artist_id) {
        $artist = Artist::select()
            ->where('artist_id','=',$artist_id)
            ->first();
        if(is_null($artist)) {
            return redirect()->route('artistList.show')->with('error_msg','データがありませんでした');
        }

        return view('hsn.artistEdit',['artist' => $artist]);
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
        $inputs['artist_image'] = $inputs['artist_image']->store('public/uploads');

        \DB::beginTransaction();
        try {
            $artist = Artist::find($inputs['artist_id']);
            $artist->fill([
                'artist_name' => $inputs['artist_name'],
                'artist_image' => $inputs['artist_image']
            ]);
            $artist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        }

        \DB::beginTransaction();
        try {
            $artist = Artist::find($inputs['artist_id']);
            $artist->fill([
                'artist_name' => $inputs['artist_name']
            ]);
            $artist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return redirect()->route('artistDetail.show',['artist_id' => $inputs['artist_id']])->with('update_success','アーティスト情報を更新しました');
    }
}
