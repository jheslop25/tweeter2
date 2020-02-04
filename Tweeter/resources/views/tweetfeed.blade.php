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
