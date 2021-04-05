<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>ユーザー登録画面</title>
    <link rel="stylesheet" href="/css/userCreate.css">
</head>
<body>
    <div class="userCreate">
    <form method="POST" action="{{route('userStore.exe')}}">
    @csrf
    @if ($errors->has('name'))
        <div class="err">
            {{ $errors->first('name') }}
        </div>
    @endif
    <label for="name">Name<br></label>
    <input type="text" id="name" name="name">
    @if ($errors->has('email'))
        <div class="err">
            {{ $errors->first('email') }}
        </div>
    @endif
    <label for="email">Email address<br></label>
    <input type="email" id="email" name="email">
    @if ($errors->has('password'))
        <div class="err">
            {{ $errors->first('password') }}
        </div>
    @endif
    <label for="password">Password<br></label>
    <input type="password" id="password" name="password">
    <label for="password.confirmation"><br></label>
    <input type="password" name="password.confirmation" id="password_confirmation" placeholder="確認のため、もう一度入力してください">
    <div class="form-bottom">
    <input type="submit" id="create" value="新規登録">
    <a href="{{route('login.show')}}">キャンセル</a>
    </div>
    </form>
    </div>
</body>
</html>