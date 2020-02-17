@extends('layouts.app')

@section('content')
    @if(Auth::check())
<form action="/user/destroy/confirm/{{Auth::user()->id}}" method="post">
            @csrf
            <button class="m-3 btn btn-danger" type="submit">Yes Delete my Account! I'm SO DONE!</button>
        </form>
    <a class="h5 m-3" href="/user/{{Auth::user()->id}}">Never Mind take me back to my profile</a>
    @endif
@endsection
