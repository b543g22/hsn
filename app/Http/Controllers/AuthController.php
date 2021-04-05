<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Support\Facades\Hash;

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
        return redirect()
            ->route('list.show')
            ->with('login_success',config('const.login_success'));

       }   
       return back()->withErrors([
        'login_error' => config('const.login_error')
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
        
        return redirect()
            ->route('login.show')
            ->with('logout',config('const.logout'));
    }

    /**
     * ユーザー登録処理
     * 
     * @param App\Http\Requests\UserStoreRequest $request 
     * @return view
     */
    public function exeUserStore(UserStoreRequest $request) {
        $inputs = $request->only('name','email','password');
        $inputs['password'] = Hash::make($inputs['password']);
        $inputs['updkbn'] = 'A';
        Member::createMember($inputs);
        return redirect()
            ->route('login.show')
            ->with('userCreateSuccess',config('const.userCreate_success'));
    }
}