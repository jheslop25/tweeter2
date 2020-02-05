@extends('layouts.app')

@include('functions')
@section('content')
@foreach ($tweets as $tweet)
<h5>user id: {{$tweet->user_id}}</h5>
<h6>Content: {{$tweet->content}}</h6>
<p>tweet id: {{$tweet->id}}</p>

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
@include('likes')
{{-- @include('comments.show')
@include('comments.create') --}}
@endforeach
@include('create')
@endsection
