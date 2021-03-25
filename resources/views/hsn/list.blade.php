<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一覧画面</title>
</head>
<body>
    <div>
      @if(session('login_success'))
        <div class="alert alert-success">
            {{session('login_success')}}
        </div>
      @endif
        <h3>プロフィール</h3>
        <ul>
            <li>名前：{{Auth::user()->name}}</li>
            <li>メールアドレス：{{Auth::user()->email}}</li>
        </ul>
        <form action="{{route('logout.exe')}}" method="POST">
        @csrf
        <button class="btn btn-danger">ログアウト</button>
        </form>
    </div>
</body>
</html>