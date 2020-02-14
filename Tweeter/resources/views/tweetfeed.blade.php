@extends('layouts.app')

@include('functions')
@section('content')
@include('create')
<div class="container mb-5">
    <div class="row justify-content-center">
@foreach ($tweets as $tweet)
<div class="col-10 col-md-5 col-lg-3 card m-4 p-3">
<a href="/user/{{$tweet->user_id}}">@ {{getUserName($tweet->user_id)}}</a>
<h6>Content: {{$tweet->content}}</h6>
@if (Auth::user()->id == $tweet->user_id)
    <form action="/tweets/goToEdit/{{$tweet->user_id}}" method="get">
        @csrf
        <button class="btn btn-dark m-2" type="submit" name="edit" value="{{$tweet->id}}">Edit</button>
    </form>
    <form action="/tweets/destroy/" method="post">
        @csrf
        <button class="btn btn-dark m-2" type="submit" name="id" value="{{$tweet->id}}" onclick="Are you sure?">Delete</button>
    </form>
@endif
<form action="/tweets/view/{{$tweet->id}}" method="get">
    @csrf
    <button class="btn btn-primary my-2" type="submit" name="id">View</button>
</form>
@include('likes')
{{-- @include('comments.show')
@include('comments.create') --}}
</div>
@endforeach
    </div>
</div>
@endsection
