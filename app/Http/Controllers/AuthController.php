<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
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
     * @return
     */
    public function login(LoginFormRequest $request) {
       $credentials = $request->only('email','password');

       if(Auth::attempt($credentials)) {
           $request->session()->regenerate();
           return redirect()->route('list')->with('login_success','ログイン成功しました！');

       }
       return back()->withErrors([
           'login_error' => 'メールアドレスかパスワードが間違っています。'
       ]);
    }

    /**
     * ログアウト処理
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login.show')->with('logout','ログアウトしました！');
    }
}