<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>曲登録</title>
</head>
<body>
    <div>
        <form method="POST" action="{{route('songStore.exe')}}" onSubmit="return checkSubmit()">
        @csrf
        <label for="song_title">曲名<br></label>
        <input type="text" name="song_title"><br>
        <label for="artist_id">アーティスト<br></label>
        <select name="artist_id">
            @foreach($artists as $artist)
                <option value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
            @endforeach
        </select><br>
        <label for="lyrics">歌詞<br></label>
        <input type="text" name="lyrics"><br>
        <input type="submit" value="登録">
        </form>
    </div>
    <a href="{{route('list.show')}}">キャンセル</a>
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