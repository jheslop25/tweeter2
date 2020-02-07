@extends('layouts.app')

@section('content')
@include('functions')
@include('profile.user')
@include('profile.tweets')
@if(isUser($user[0]->name, Auth::user()->name))
@include('profile.createTweet')
@endif
@endsection
