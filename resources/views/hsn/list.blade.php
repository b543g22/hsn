<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>曲一覧</title>
</head>
<header>
<h1><a href="{{route('list.show')}}">MMS</a><h1>
<a href="{{route('artistList.show')}}">アーティスト</a>
</header>
<body>
    <div>
    <h2>曲一覧<h2>
    @if(session('err_msg'))
        <p class="text-danger">
            {{session('err_msg')}}
        </p>
    @endif
    @if(session('success_msg'))
        <p class="text-danger">
            {{session('success_msg')}}
        </p>
    @endif
    <table>
        <tr>
            <th>曲番号</th>
            <th>アーティスト</th>
            <th>曲名</th>
        </tr>
        @foreach($lists as $list)
        <tr>
            <td>{{$list->song_id}}</td>
            <td>{{$list->artist_name}}</td>
            <td><a href="{{route('detail.show',['song_id' => $list->song_id])}}">{{$list->song_title}}</a></td>
        </tr>
        @endforeach
    </table>
    </div>
    <a href="{{route('songCreate.show')}}">新規登録</a>
    <div>
    <form action="{{route('logout.exe')}}" method="POST">
    @csrf
    <button class="btn btn-danger">ログアウト</button>
    </form>
    </div>
</body>
</html>