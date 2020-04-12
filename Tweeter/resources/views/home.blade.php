@extends('layouts.app')'
@section('header')
    <title>Welcome To Tweeter!</title>
@endsection

@section('content')
    <div class="app">  
        <Home logo="{{ url('/logo.png')}}"/>
    </div>
@endsection
