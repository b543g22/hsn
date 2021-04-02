<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>ログインフォーム</title>
    <link rel="stylesheet" href="/css/login_form.css">
</head>
<body>
<div class="loginform">
    <h1>Music System</h1>
        <div class="msg">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        </div>

    @if(session('login_error'))
        <p class="msg">
            {{session('login_error')}}
        </p>
    @endif
    @if(session('logout'))
        <p class="msg">
            {{session('logout')}}
        </p>
    @endif
        <p class="msg">
        @if(session('userCreateSuccess'))
            {{session('userCreateSuccess')}}
        @endif
        </p>
    <div class="loginform_div">
        <form class="loginform" method="POST" action="{{route('login.exe')}}">
        @csrf
        <div class="test-input">
            <label for="email">Email address</label>
            <input type="text" name="email" id="email">
            <span class="separator"></span>
        </div>
        <div class="test-input">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span class="separator"></span>
        </div>
        <div class="form-bottom">
            <input type="submit" id="login" value="ログイン">
            <a href="{{route('userCreate.show')}}">ユーザ登録</a>
        </div>
            <!-- <ul>
                <li><input type="email" name="email" placeholder="Email address" class="text"></li>
                <li><input type="password" name="password" placeholder="Password" class="text"></li>
                <li><input type="submit" value="ログイン" class="button"></li>
            </ul> -->
        </form>
    </div>
</div>
</body>
</html>