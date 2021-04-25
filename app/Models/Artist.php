<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {
    //テーブル名
    protected $table = 'artists';
    //主キー
    protected $primaryKey = "artist_id";
    //可変項目
    protected $fillable = [
        'artist_name',
        'artist_image',
        'updkbn'
    ];

    //結合:songテーブル hasMany
    public function songs() {
        return $this->hasMany('App\Models\Song');
    }

    /**
     * アーティスト一覧画面データ
     * @return array $list
     */
    public static function showList() {
        $list = Artist::select()
            ->where('updkbn','<>','D')
            ->orderBy('artist_id')
            ->get();
        return $list;
    }

    /**
     * アーティスト詳細画面データ
     * @param int $artist_id
     * @return array $artist
     */
    public static function showDetail(int $artist_id) {
        $artist = Artist::select()
            ->where('artist_id','=',$artist_id)
            ->first();
        return $artist;
    }

    /**
     * アーティスト更新処理(アーティスト写真込み)
     * @param array $inputs
     */
    public static function exeUpdate(array $inputs) {
        $inputs['artist_image'] = $inputs['artist_image']->store('public/uploads');
        \DB::beginTransaction();
        try {
            $artist = Artist::find($inputs['artist_id']);
            $artist->fill([
                'artist_name' => $inputs['artist_name'],
                'artist_image' => $inputs['artist_image'],
                'updkbn' => 'U'
            ]);
            $artist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }
    /**
     * アーティスト更新処理(アーティスト写真無し)
     * @param array $inputs
     */
    public static function exeUpdateImg(array $inputs) {
        // dd($inputs);
        \DB::beginTransaction();
        try {
            $artist = Artist::find($inputs['artist_id']);
            $artist->fill([
                'artist_name' => $inputs['artist_name'],
                'updkbn' => 'U'
            ]);
            $artist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * アーティスト登録処理
     * @param array $inputs
     */
    public static function exeStore(array $inputs) {
        $inputs['artist_image'] = $inputs['artist_image']->store('public/uploads');
        $inputs['updkbn'] = 'A';
        \DB::beginTransaction();
        try {
            Artist::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * アーティスト削除処理
     * @param int $artist_id
     */
    public static function exeDelete(int $artist_id) {
        \DB::beginTransaction();
        try {
            $artist = Artist::find($artist_id);
            $artist->fill([
                'updkbn' => 'D'
            ]);
            $artist->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }

    /**
     * アーティスト予測検索用データ
     * @param string $song_title
     * @return array $songs
     */
    public static function getArtistName(array $inputs) {
        $artist_name = $inputs['artist_name'];
        $artists = Artist::select()
            ->where('artists.updkbn','<>','D')
            ->where('artists.artist_name','like','%'.$artist_name.'%')
            ->orderBy('artists.artist_name')
            ->get();
        return $artists;
    }
}
