<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
    // テーブル名
    protected $table = 'members';

    // 可変項目
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
