<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>配信曲編集</title>
</head>
<body>
    <div>
        <form method="POST" action="{{route('update.exe')}}" onSubmit="return checkSubmit()">
        @csrf
        <input type="hidden" name="song_id" value="{{$list->song_id}}">
        <label for="title">曲名<br></label>
        <input type="text" name="title" value="{{$list->song_title}}"><br>
        <label for="artist_id">アーティスト<br></label>
        <select name="artist_id">
            @foreach($artists as $artist)
            @if($list->artist_id === $artist->artist_id)
                <option value="{{$artist->artist_id}}" selected>{{$artist->artist_name}}</option>
            @else
                <option value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
            @endif
            @endforeach
        </select><br>
        <label for="lyrics">歌詞<br></label>
        <input type="text" name="lyrics" value="{{$list->lyrics}}"><br>
        <input type="submit" value="更新">
        </form>
    </div>
    <a href="{{route('detail.show',['song_id' => $list->song_id])}}">キャンセル</a>
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