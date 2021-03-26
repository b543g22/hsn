<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>配信曲詳細</title>
</head>
<body>
    @if(session('update_success'))
        <p>
            {{session('update_siccess')}}
        </p>
    @endif
    <div>
        <h2>{{$list->song_title}}</h2> 
        <a>{{$list->artist_name}}<br></a>
        <a>{{$list->lyrics}}<br></a>
    </div>
    <button type="button" onclick='location.href="/list/{{$list->song_id}}/edit"'>編集</button><br>
    <a href="{{route('list.show')}}">一覧へ戻る</a>
</body>
</html>