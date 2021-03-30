<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable {
    // テーブル名
    protected $table = 'members';

    // 可変項目
    protected $fillable = [
        'name',
        'email',
        'password',
        'updkbn'
    ];
}
