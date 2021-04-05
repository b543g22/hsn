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

    /**
     * ユーザ登録処理
     * @param array $inputs
     */
    public static function createMember(array $inputs) {
        \DB::beginTransaction();
        try {
        Member::create($inputs);
        \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
    }
}
