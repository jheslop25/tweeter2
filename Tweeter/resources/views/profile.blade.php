@extends('layouts.app')

@section('content')
    @include('functions')
    @include('profile.user')
    @include('profile.upload')
@if(isUser($user[0]->name, Auth::user()->name))
    @include('profile.createTweet')
@endif
<div class="row justify-content-center mx-3">
    @include('profile.tweets')
</div>
@endsection
