@extends('layout')
@section('title','アーティスト詳細')
@section('css','/css/artistDetail.css')
@section('content')
    @if(session('err_msg'))
        <p>
            {{session('err_msg')}}
        </p>
    @endif
    <div class="artistDetail">
        <div class="artistDetail_menu">
            <a href="{{route('artistEdit.show',[
                'artist_id' => $artist->artist_id
            ])}}">編集</a>
            <a href="{{route('artistDelete.exe',[
                'artist_id' => $artist->artist_id
            ])}}" class="delete">削除</a>
        </div>
        <p class="title"><span>アーティストNo</span></p>
        <p>{{$artist->artist_id}}</p><hr>
        <p class="title"><span>アーティスト名</span></p>
        <p>{{$artist->artist_name}}</p><hr>
        <p class="title"><span>アーティスト写真</span></p>
        @if(!is_null($artist->artist_image))
        <td><img src="{{Storage::url($artist->artist_image)}}" width="600px" height="400px"></td>
        @endif
    </div>
    <a href="{{route('artistList.show')}}">一覧へ戻る</a>
@endsection