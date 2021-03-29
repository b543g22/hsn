<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アーティスト編集</title>
</head>
<body>
    <div>
    <p>アーティスト番号：{{$artist->artist_id}}</p>
    <form method="POST" action="{{route('artistUpdate.exe')}}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
    @csrf
        <input type="hidden" name="artist_id" value="{{$artist->artist_id}}">
        <label for="artist_name">アーティスト名</label>
        <input type="text" name="artist_name" value="{{$artist->artist_name}}"><br>
        <input type="file" name="artist_image"><br>
        <input type="submit" value="更新">
    </form>
    </div>
    <a href="/artist/{{$artist->artist_id}}">キャンセル</a>
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