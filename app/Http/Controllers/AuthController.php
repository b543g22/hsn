<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;

class AuthController extends Controller {
    /**
     * ログイン処理 
     * 
     * @param App\Http\Requests\LoginFormRequest $request
     * @return
     */
    public function exeLogin(LoginFormRequest $request) {
       $credentials = $request->only('email','password');

       if(Auth::attempt($credentials)) {
           $request->session()->regenerate();
           return redirect()->route('list.show')->with('login_success','ログイン成功しました！');

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
    public function exeLogout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login.show')->with('logout','ログアウトしました！');
    }

    /**
     * ユーザー登録処理
     * 
     * @param App\Http\Requests\UserStoreRequest $request 
     * @return view
     */
    public function exeUserStore(UserStoreRequest $request) {
        // $inputs = $request->only('name','email','password');
        $inputs = $request->all();
        dd($inputs);
        \DB::beginTransaction();
        try {
        Member::create($inputs);
        \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        return redirect()->route('login.show');
    }
}