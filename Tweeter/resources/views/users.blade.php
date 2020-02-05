@extends('layouts.app')
@php
    function checkFollowing($userToCheck, $follows){
        foreach($follows as $follow){
            if($follow->followed_id == $userToCheck){
                return true;
            }
        }
        return false;
    }
    function isUser($userToCheck, $authUser){
        if($userToCheck == $authUser){
            return true;
        }
        return false;
    }
@endphp
@section('content')
{{-- @php
    var_dump($users);
@endphp --}}
@guest
<p>please login</p>
@else
this is a list of tweeter users:
@foreach ($users as $user)
<h3>{{$user->name}}</h3>
<form action="/user/{{$user->id}}" method="get">
    @csrf
<button type="submit" name="userTweets" value="{{$user->name}}">See Tweets by {{$user->name}}</button>
</form>
@if(checkFollowing($user->id, $follows))
<p>you are already following this tweeter</p>
<form action="/user/unfollow" method="post">
@csrf
<button type="submit" name="followedID" value="{{$user->id}}">Unfollow {{$user->name}}</button>
</form>
@elseif(isUser($user->name, Auth::user()->name))
<p>you can't follow yourself. sorry. circles</p>
@else
<form action="/user/follow" method="post">
    @csrf
<button type="submit" name="followId" value="{{$user->id}}">Follow {{$user->name}}</button>
</form>
@endif
@endforeach

@endguest

@endsection
