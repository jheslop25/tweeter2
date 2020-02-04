@extends('layouts.app')

@section('content')
<h5>User: {{$user[0]->name}}</h5>
@if (Auth::user()->name == $user[0]->name) {{-- add proper auth later--}}

<h6>Your Email is: {{$user[0]->email}}</h6>
<form action="/user/edit" method="post">
@csrf
<p>update your name</p>
<input type="text" name="name" value="{{$user[0]->name}}">
<p>update your email</p>
<input type="text" name="email" value="{{Auth::user()->email}}"><br>
<button type="submit">Submit</button>
</form>
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<form action="/user/destroy/{{Auth::user()->id}}" method="get">
@csrf
<button type="submit">Delete My Account</button>
</form>
<form action="/user/follow">
@csrf
<button type="submit" name="FolowId" value="{{$user[0]->user_id}}">Follow</button>
</form>

@endif

@foreach ($tweets as $tweet)
{{-- <h5>{{$tweet->user_id}}</h5> --}}
<h6>{{$user[0]->name}}: "{{$tweet->content}}"</h6>
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
