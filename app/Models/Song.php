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
        'artist_id'
    ];

    //結合：artistsテーブル belongsTo
    public function artist() {
        return $this->belongsTo('App\Models\artist');
    }

}
