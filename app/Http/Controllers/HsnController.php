<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;
use App\Http\Requests\UpdateRequest;
use App\Models\Song;
use App\Models\Artist;

class HsnController extends Controller {
    /**
     * 一覧画面表示
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
     * 詳細画面表示
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
     * 編集画面表示
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
     * 編集処理
     * 
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
        return redirect('/list/{{$request->song_id}}')->with('update_success','曲情報を更新しました');
    }
}
