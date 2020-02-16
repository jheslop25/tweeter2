@extends('layouts.app')

@section('content')
    @include('functions')
    @include('profile.user')
@if(isUser($user[0]->name, Auth::user()->name))
    @include('create')
@endif
<div class="row justify-content-center mx-3">
    @include('profile.tweets')
</div>
@endsection
