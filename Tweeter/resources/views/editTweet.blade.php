@extends('layouts.app')

@section('content')
@foreach ($tweets as $tweet)
<h5>{{$tweet['user_id']}}</h5>
<h6>{{$tweet['content']}}</h6>
@endforeach
<form action="/tweets/update" method="post">
    @csrf
<input type="number" name="tweet_id" value="{{$tweet['id']}}" readonly>
<input type="text" name="content" value="{{$tweet['content']}}">
    <button type="submit">edit your tweet!</button>
    </form>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
@endsection
