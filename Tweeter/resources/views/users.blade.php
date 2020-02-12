@extends('layouts.app')

@section('content')
<div class="vh-50">
    @include('functions')

    @guest
        <p>please login</p>
    @endguest
    @Auth
        <p class="h4 ml-3">Discover Tweeters to Follow!</p>
        @foreach ($users as $user)
            @if(isUser($user->name, Auth::user()->name))

            @else
            <div class="row justify-content-center m-3 p-3">
                <div class="col-sm-6 col-md-6 card p-3">
                    <h3>@ {{$user->name}}</h3>
                    <form action="/user/{{$user->id}}" method="get">
                        @csrf
                        <button class="btn btn-primary" type="submit" name="userTweets" value="{{$user->name}}">Profile</button>
                    </form>
                    @if(checkFollowing($user->id, $follows))
                        <form action="/user/unfollow" method="post">
                            @csrf
                            <button class="btn btn-danger my-2" type="submit" name="followedID" value="{{$user->id}}">Unfollow {{$user->name}}</button>
                        </form>
                    @else
                    <form action="/user/follow" method="post">
                        @csrf
                        <button class="btn btn-success my-2" type="submit" name="followId" value="{{$user->id}}">Follow {{$user->name}}</button>
                    </form>
                    @endif
                </div>
            </div>
                @endif
            @endforeach
    @endAuth
</div>
@endsection
