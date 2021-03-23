<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function login() {

    }
}
