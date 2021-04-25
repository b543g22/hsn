<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model {
    //テーブル名
    protected $table = 'songs';
    //主キー
    protected $primaryKey = "song_id";

    //可変項目
    protected $fillable = [
        'song_title',
        'lyrics',
        'artist_id',
        'updkbn'
    ];

    //結合：artistsテーブル belongsTo
    public function artist() {
        return $this->belongsTo('App\Models\artist');
    }

    /**
     * 曲一覧画面データ
     * @return array $list
     */
    public static function getShowList() {
        $list = Song::select()
        ->join('artists','songs.artist_id','=','artists.artist_id')
        ->where('artists.updkbn','<>','D')
        ->where('songs.updkbn','<>','D')
        ->orderBy('songs.song_id')
        ->get();
        return $list;
    }

    /**
     * 曲詳細画面データ
     * @param int $song_id
     * @return $song
     */
    public static function getShowDetail(int $song_id) {
        $song = Song::select()
            ->join('artists','songs.artist_id','=','artists.artist_id')
            ->where('songs.song_id','=',$song_id)
            ->first();
        return $song;
    }

    /**
     * 曲更新処理
     * @param array $inputs
     */
    public static function exeUpdate(array $inputs) {
        \DB::beginTransaction();
        try {
            $song = Song::find($inputs['song_id']);
            $song->fill([
                'song_title' => $inputs['song_title'],
                'lyrics' => $inputs['lyrics'],
                'artist_id' => $inputs['artist_id'],
                'updkbn' => 'U'
            ]);
            $song->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * 曲登録処理
     * @param array $inputs
     */
    public static function exeStore(array $inputs) {
        $inputs['updkbn'] = 'A';
        \DB::beginTransaction();
        try {
            Song::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * 曲削除処理
     * @param int $song_id
     */
    public static function exeDelete(int $song_id) {
        \DB::beginTransaction();
        try {
            $song = Song::find($song_id);
            $song->fill([
                'updkbn' => 'D'
            ]);
            $song->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * 対象アーティストの曲データ
     * @param int $artist_id
     * @return array $songs
     */
    public static function artistSong(int $artist_id) {
        $songs = Song::select()
            ->join('artists','artists.artist_id','=','songs.artist_id')
            ->where('songs.updkbn','<>','D')
            ->where('artists.artist_id','=',$artist_id)
            ->get();
        return $songs;
    }

    /**
     * 曲予測検索用データ
     * @param string $song_title
     * @return array $songs
     */
    public static function getSongName(array $inputs) {
        $song_title = $inputs['song_title'];
        $songs = Song::select()
            ->join('artists','artists.artist_id','=','songs.artist_id')
            ->where('songs.updkbn','<>','D')
            ->where('songs.song_title','like','%'.$song_title.'%')
            ->orderBy('songs.song_title')
            ->get();
        return $songs;
    }
}
