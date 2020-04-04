@extends('layouts.app')

@section('content')
    <div id="app">
        <tweet-feed logoUrl="{{ url('/logo.png')}}"></tweet-feed>
    </div>
@endsection
