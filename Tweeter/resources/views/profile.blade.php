@extends('layouts.app')

@section('content')
    @include('functions')
    @include('profile.user')
@if(isUser($user[0]->name, Auth::user()->name))
    @include('profile.createTweet')
@endif
    @include('profile.tweets')
@endsection
