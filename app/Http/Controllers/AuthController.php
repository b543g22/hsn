<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;

class AuthController extends Controller
{
    /**
     * ログイン画面を表示する
     * 
     * @return View
     */
    public function showLogin() {
        return view('hsn.login_form');
    }

    /**
     * ログイン処理 
     * 
     * @param App\Http\Requests\LoginFormRequest $request
     */
    public function login(LoginFormRequest $request) {
        dd($request->all());
    }
}
