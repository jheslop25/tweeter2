@extends('layouts.app')
@include('functions')
@section('content')
<div class="container">
@foreach ($tweets as $tweet)
    <div class="card mb-4 p-3">
        <div class="col-sm-8">
        <a href='/user/{{$tweet['user_id']}}' class="text-muted">@ {{getUserName($tweet['user_id'])}}</a>
            <h5>{{$tweet['content']}}</h5>
            <div class="row">
                <div class="col">
                @include('likes')
                </div>
            </div>
        </div>


@endforeach
@if (Auth::user()->id == $tweet['user_id'])
@include('tweetComp.edit')
@endif
    </div>
</div>
<div class="container">
    @foreach ($comments as $comment)
        <div class="card mb-3 p-3">
            <div class="col-*">
                @include('comments.show')
            </div>
            <div class="col-*">
                @include('comments.edit')
            </div>
        </div>
    @endforeach

    @include('comments.create')
    <a href="/tweets">Back to Tweet Feed</a>
</div>
@endsection
