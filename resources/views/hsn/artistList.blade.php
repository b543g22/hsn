@extends('layout')
@section('title','アーティスト一覧')
@section('css','/css/artistList.css')
@section('js1','/js/artist_search.js')
@section('js2','/js/artistListTable.js')
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
    <div class="artistList">
        <div class="artistList_head">
            <h3>アーティスト一覧</h3>
            <a href="{{route('artistCreate.show')}}">登録</a>
            <!-- 非同期処理を用いた検索機能 -->
            <form>
                <input type="text" id="search_artist" name="search_artist" placeholder="アーティスト名">
                <input type="button" id="search_button" name="search_button" value='検索'>
            </form>
            <!-- /非同期処理を用いた検索機能-->
        </div>
        <hr>
        <table class="artistList_table">
            <thead>
                <tr>
                    <th>アーティストNo</th>
                    <th>アーティスト名</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lists as $list)
            <tr class="artistData" data-href="{{route('artistDetail.show',[
                    'artist_id' => $list->artist_id
                    ])}}">
                <td>{{$list->artist_id}}</td>
                <td>{{$list->artist_name}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection