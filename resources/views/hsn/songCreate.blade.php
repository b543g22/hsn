@extends('layout')
@section('title','曲登録')
@section('css','/css/songCreate.css')
@section('content')
<form method="POST" action="{{route('songStore.exe')}}" class="songCreate" onSubmit="return checkSubmit()">
@csrf
    <label for="song_title">曲名</label><br>
    <input type="text" name="song_title" id="song_title"><br>
    <label for="artist_id">アーティスト</label><br>
    <select name="artist_id" id="artist_id">
        @foreach($artists as $artist)
            <option value="{{$artist->artist_id}}">{{$artist->artist_name}}</option>
        @endforeach
    </select><br>
    <label for="lyrics">歌詞</label><br>
    <textarea name="lyrics" id="lyrics" rows="17" cols="150"></textarea><br>
    <input type="submit" id="store" value="登録">
</form>
<a href="{{route('list.show')}}">キャンセル</a>
@endsection