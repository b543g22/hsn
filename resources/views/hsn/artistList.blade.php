<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>アーティスト一覧</title>
</head>
<body>
    <a href="{{route('list.show')}}">曲一覧</a>
    @if(session('err_msg'))
        <p class="text-danger">
            {{session('err_msg')}}
        </p>
    @endif
    <div>
    <table>
        <tr>
            <th>アーティスト番号</th>
            <th>アーティスト名</th>
        </tr>
        @foreach($lists as $list)
        <tr>
            <td>{{$list->artist_id}}</td>
            <td><a href="{{route('artistDetail.show',['artist_id' => $list->artist_id])}}">{{$list->artist_name}}</a></td>
        </tr>
        @endforeach
    </table>
    </div>
</body>
</html>