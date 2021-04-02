@extends('layout')
@section('title','アーティスト一覧')
@section('css','/css/artistList.css')
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
    <div class="artistList">
        <div class="artistList_head">
            <h3>アーティスト一覧</h3>
            <a href="{{route('artistCreate.show')}}">登録</a>
        </div>
        <hr>
        <table class="artistList_table">
            <tr>
                <th>アーティストNo</th>
                <th>アーティスト名</th>
            </tr>
            @foreach($lists as $list)
            <tr>
                <td>{{$list->artist_id}}</td>
                <td><a href="{{route('artistDetail.show',['artist_id' => $list->artist_id])}}">{{$list->artist_name}}</a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection