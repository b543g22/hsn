@extends('layout')
@section('title','アーティスト登録')
@section('css','/css/artistCreate.css')
@section('content')
<form method="POST" action="{{route('artistStore.exe')}}" class="artistCreate" enctype="multipart/form-data" onSubmit="return checkSubmit()">
@csrf
    <label for="artist_name">アーティスト名</label><br>
    <input type="text" name="artist_name" id="artist_name"><br>
    <label for="artist_image">アーティスト写真</label><br>
    <input type="file" name="artist_image" id="artist_image"><br>
    <input type="submit" id="store" value="登録">
</form>
<a href="{{route('artistList.show')}}">キャンセル</a>
@endsection