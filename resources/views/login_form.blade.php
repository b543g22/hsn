<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインフォーム</title>
    <link rel="stylesheet" href="/css/login_form.css">
</head>
<body>
<div class="home">
        <h1>Music Stream System</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('login_error'))
        <div class="alert alert-success">
            {{session('login_error')}}
        </div>
    @endif
    @if(session('logout'))
        <div class="alert alert-success">
            {{session('logout')}}
        </div>
    @endif
    @if(session('userCreateSuccess'))
        <div class="alert alert-success">
            {{session('userCreateSuccess')}}
        </div>
    @endif
    <form class="loginform" method="POST" action="{{route('login.exe')}}">
    @csrf
    <ul>
    <li><input type="email" name="email" placeholder="Email address" class="text"></li>
    <li><input type="password" name="password" placeholder="Password" class="text"></li>
    <li><input type="submit" value="ログイン" class="button"></li>
    </ul>
    </form>
    <a href="{{route('userCreate.show')}}">ユーザ新規登録</a>
</div>
</body>
</html>