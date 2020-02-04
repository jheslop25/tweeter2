@extends('layouts.app')

@section('content')


@foreach ($tweets as $tweet)
<h5>{{$tweet->user_id}}</h5>
<h6>{{$tweet->content}}</h6>
{{-- @php
    var_dump($tweet);
@endphp --}}
@if (Auth::user()->id == $tweet->user_id)
    <form action="/tweets/goToEdit/{{$tweet->user_id}}" method="get">
        @csrf
        <button type="submit" name="edit" value="{{$tweet->id}}">Edit Tweet</button>
    </form>
    <form action="/tweets/destroy/" method="post">
        @csrf
        <button type="submit" name="id" value="{{$tweet->id}}" onclick="Are you sure?">Delete Tweet</button>
    </form>
@endif
<form action="/tweets/view/{{$tweet->id}}" method="get">
    @csrf
    <button type="submit" name="id">View Tweet</button>
</form>
<form action="/tweets/likes" method="post">
    @csrf
<button type="submit" name="like" value="{{$tweet->tweet_id}}">Like This Tweet</button>
</form>
@endforeach
<form action="/tweets/create" method="post">
@csrf
<input type="text" name="content" value="what's on your mind?">
<button type="submit">publish your tweet!</button>
</form>
@error('content')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@endsection
