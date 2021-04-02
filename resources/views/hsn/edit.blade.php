@extends('layout')
@section('title','曲編集')
@section('css','/css/songEdit.css')
@section('content')
<form method="POST" action="{{route('update.exe')}}" class="songEdit" onSubmit="return checkSubmit()">
@csrf
    <input type="hidden" name="song_id" value="{{$list->song_id}}">
    <label for="song_title">タイトル</label><br>
    <input type="text" name="song_title" id="song_title" value="{{$list->song_title}}" required
           minlength="1" maxlength="100" size="100"><br>
    <label for="artist_id">アーティスト</label><br>
    <select name="artist_id" id="artist_id">
        @foreach($artists as $artist)
        @if($list->artist_id === $artist->artist_id)
            <option value="{{$artist->artist_id}}" selected>{{$artist->artist_name}}</option>
        @else
            <option value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
        @endif
        @endforeach
    </select><br>
    <label for="lyrics">歌詞</label><br>
    <textarea name="lyrics" id="lyrics" rows="17" cols="150">{{$list->lyrics}}</textarea><br>
    <input type="submit" id="update" value="更新">
</form>
<a href="{{route('detail.show',['song_id' => $list->song_id])}}">キャンセル</a>
@endsection
