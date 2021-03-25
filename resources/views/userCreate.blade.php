<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録画面</title>
</head>
<body>
    <form method="POST" action="{{route('userStore.exe')}}">
    @csrf
    @if ($errors->has('name'))
        <div class="text-danger">
            {{ $errors->first('name') }}
        </div>
    @endif
    <p>
    <label for="name">名前<br></label>
    <input type="text" name="name">
    </p>
    @if ($errors->has('email'))
        <div class="text-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    <p>
    <label for="email">メールアドレス<br></label>
    <input type="email" name="email">
    </p>
    @if ($errors->has('password'))
        <div class="text-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
    <p>
    <label for="password">パスワード<br></label>
    <input type="password" name="password">
    </p>
    <p>
    <label for="password.confirmation"><br></label>
    <input type="password" name="password.confirmation" placeholder="確認のため、もう一度入力してください">
    </p>
    <p>
    <input type="submit" value="新規登録">
    </p>
    </form>
</body>
</html>