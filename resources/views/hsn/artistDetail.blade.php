<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>アーティスト詳細</title>
</head>
<body>
    @if(session('err_msg'))
        <p class="text-danger">
            {{session('err_msg')}}
        </p>
    @endif
    <div>
    <table>
        <tr>
            <th>アーティスト番号</th>
            <td>{{$artist->artist_id}}</td>
        </tr>
        <tr>
            <th>アーティスト名</th>
            <td>{{$artist->artist_name}}</td>
        <tr>
            <th>アーティスト写真</th>
            @if(!is_null($artist->artist_image))
            <td><img src="{{Storage::url($artist->artist_image)}}" width="150px" height="100px"></td>
            @endif
        </tr>
    </table>
    <button type="button" onclick='location.href="/artist/{{$artist->artist_id}}/edit"'>編集</button><br>
    <button type="button" onclick='location.href="/artist/{{$artist->artist_id}}/delete"'>削除</button><br>
    <a href="{{route('artistList.show')}}">一覧へ戻る</a>
    </div>
</body>
</html>