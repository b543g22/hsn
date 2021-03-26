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
        'artist_name'
    ];

    //結合:songテーブル hasMany
    public function songs() {
        return $this->hasMany('App\Models\Song');
    }
}
