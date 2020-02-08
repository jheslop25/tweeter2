@extends('layouts.app')

@section('content')
@include('functions')
{{-- @php
    var_dump($users);
@endphp --}}
@guest
<p>please login</p>
@else
<p class="h4">Discover Tweeters to Follow!</p>
@foreach ($users as $user)
@if(isUser($user->name, Auth::user()->name))

@else
<div class="card m-3 p-3">
<h3>{{$user->name}}</h3>
<form action="/user/{{$user->id}}" method="get">
    @csrf
<button class="btn btn-primary" type="submit" name="userTweets" value="{{$user->name}}">Profile</button>
</form>
@if(checkFollowing($user->id, $follows))
<p class="alert alert-light">you are already following this tweeter</p>
<form action="/user/unfollow" method="post">
@csrf
<button class="btn btn-danger" type="submit" name="followedID" value="{{$user->id}}">Unfollow {{$user->name}}</button>
</form>
@else
<form action="/user/follow" method="post">
    @csrf
<button class="btn btn-success my-2" type="submit" name="followId" value="{{$user->id}}">Follow {{$user->name}}</button>
</form>
@endif
@endif
</div>
@endforeach

@endguest

@endsection
