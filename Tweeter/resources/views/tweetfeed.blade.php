@extends('layouts.app')

@section('content')


@foreach ($tweets as $tweet)
<h5>{{$tweet->user_id}}</h5>
<h6>{{$tweet->content}}</h6>
{{-- @php
    var_dump($tweet);
@endphp --}}
<form action="/tweets/goToEdit/{{$tweet->user_id}}" method="get">
    @csrf
<button type="submit" name="edit" value="{{$tweet->id}}">Edit Tweet</button>
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
