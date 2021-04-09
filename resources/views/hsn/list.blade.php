@extends('layout')
@section('title','曲一覧')
@section('css','/css/songList.css')
@section('js1','/js/song_search.js')
@section('js2','/js/songListTable.js')
@section('content')
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
    <p class="seach_err"></p>
    <div class="songList">
        <div class="songList_head">
            <h3>曲一覧</h3>
            <a href="{{route('songCreate.show')}}">登録</a>
            <!-- 非同期処理を用いた検索機能 -->
            <form>
                <input type="text" id="search_song" name="search_song" placeholder="タイトル">
                <input type="button" id="search_button" name="search_button" value='検索'>
            </form>
            <!-- /非同期処理を用いた検索機能 -->
        </div>
        <hr>
        <table class="songList_table">
            <thead>
                <tr>
                    <th id="title_song_id">曲No</th>
                    <th id="title_artist_name">アーティスト名</th>
                    <th id="title_song_title">タイトル</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lists as $list)
            <tr class="songData" data-href="{{route('detail.show',[
                    'song_id' => $list->song_id
                ])}}">
                <td>{{$list->song_id}}</td>
                <td>{{$list->artist_name}}</td>
                <td>{{$list->song_title}}</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection