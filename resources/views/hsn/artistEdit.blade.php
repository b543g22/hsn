@extends('layout')
@section('title','アーティスト編集')
@section('css','/css/artistEdit.css')
@section('content')
<form method="POST" action="{{route('artistUpdate.exe')}}" class="artistEdit" enctype="multipart/form-data" onSubmit="return checkSubmit()">
@csrf
    <input type="hidden" name="artist_id" value="{{$artist->artist_id}}">
    <label for="artist_name">アーティスト名</label><br>
    <input type="text" name="artist_name" id="artist_name" value="{{$artist->artist_name}}" required
           minlength="1" maxlength="50" size="100"><br>
    <label for="artist_image">アーティスト写真</label><br>
    <input type="file" name="artist_image" id="artist_image"><br>
    <input type="submit" id="update" value="更新">
</form>
<a href="{{route('artistDetail.show',['artist_id' => $artist->artist_id])}}">キャンセル</a>
<!-- <a href="/artist/{{$artist->artist_id}}">キャンセル</a> -->
@endsection