@extends('layouts.app')

@section('content')
<div id="app" class="row justify-content-center mx-1">
    @include('functions')
    @include('profile.user')
@if(isUser($user[0]->name, Auth::user()->name))
@endif
    <Profile logourl="/logo.png" userid="{{ $user[0]->id }}" />
</div>
@endsection
