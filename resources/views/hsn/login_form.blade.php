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
    <form class="loginform" method="POST" action="{{route('login')}}">
    @csrf
    <ul>
    <li><input type="email" name="email" placeholder="Email address" class="text"></li>
    <li><input type="password" name="password" placeholder="Password" class="text"></li>
    <li><input type="submit" value="ログイン" class="button"></li>
    </ul>
    </form>
</div>
    <footer>
            <p>©2021 I.K</p>
    </footer>
</body>
</html>