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
        <label for="title">曲名<br></label>
        <input type="text" name="title"><br>
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
        <input type="text" name="lyrics"><br>
        <input type="submit" value="登録">
        </form>
    </div>
    <a href="{{route('list.show')}}">キャンセル</a>
</body>
</html>