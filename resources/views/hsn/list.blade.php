@extends('layout')
@section('title','曲一覧')
@section('css','/css/songList.css')
@section('js','/js/song_search.js')
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
            <form>
                <input type="text" id="search_song" name="search_song" placeholder="タイトル">
                <input type="button" id="search_button" name="search_button" value='検索'>
            </form>
        </div>
        <hr>
        <table class="songList_table">
            <tr>
                <th>曲No</th>
                <th>アーティスト名</th>
                <th>タイトル</th>
            </tr>
            @foreach($lists as $list)
            <tr class="songData">
                <td>{{$list->song_id}}</td>
                <td>{{$list->artist_name}}</td>
                <td><a href="{{route('detail.show',[
                    'song_id' => $list->song_id
                ])}}">{{$list->song_title}}</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection