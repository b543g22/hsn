@extends('layout')
@section('title','曲詳細')
@section('css','/css/songDetail.css')
@section('content')
    @if(session('update_success'))
        <p>
            {{session('update_siccess')}}
        </p>
    @endif
    <div class="songDetail">
        <div class="songDetail_menu">
        <a href="{{route('edit.show',[
            'song_id' => $list->song_id
        ])}}">編集</a>
        <a href="{{route('songDelete.exe',[
            'song_id' => $list->song_id
        ])}}">削除</a>
        </div>
        <p class="title"><span>曲No</span></p>
        <p>{{$list->song_id}}</p><hr>
        <p class="title"><span>タイトル</span></p>
        <p>{{$list->song_title}}</p><hr>
        <p class="title"><span>アーティスト</span></p>
        <p>{{$list->artist_name}}</p><hr>
        <p class="title"><span>歌詞</span></p>
        <p>{{$list->lyrics}}</p><hr>
    </div>
    <a class="ichiran" href="{{route('list.show')}}">一覧へ戻る</a>

@endsection