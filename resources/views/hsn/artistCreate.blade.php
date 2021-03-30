<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アーティスト登録</title>
</head>
<body>
<div>
    <form method="POST" action="{{route('artistStore.exe')}}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
    @csrf
        <label for="artist_name">アーティスト名</label>
        <input type="text" name="artist_name"><br>
        <input type="file" name="artist_image"><br>
        <input type="submit" value="更新">
    </form>
</div>
<a href="{{route('artistList.show')}}">キャンセル</a>
</body>
</html>
<script>
function checkSubmit() {
    if(window.confirm('更新してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}
</script>