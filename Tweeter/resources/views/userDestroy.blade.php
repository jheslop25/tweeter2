@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <form action="/user/destroy/confirm" method="post">
            @csrf
            <button type="submit">Yes Delete my Account! I'm SO DONE!</button>
        </form>
    <a href="/user/{{Auth::user()->id}}">Never Mind take me back to my profile</a>
    @endif
@endsection
