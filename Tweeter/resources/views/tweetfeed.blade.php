@extends('layouts.app')

    @include('functions')
@section('content')
    @include('create')
    <div class="container mb-5">
        <div class="row justify-content-center">
            @foreach ($tweets as $tweet)
        <tweet href='test/test/test' logo="{{ url('/logo.png')}}" username="{{getUserName($tweet->user_id)}}" content="{{$tweet->content}}" date="{{$tweet->created_at->diffForHumans()}}" />
                <div class="col-10 card m-4 p-3">
                    <a class="card-title" href="/user/{{$tweet->user_id}}">@ {{getUserName($tweet->user_id)}}<img class="img-fluid" style="width: 30px;" src="{{ url('/logo.png')}}" alt="The Great Ironic Eagle"></a>
                        @if ($tweet->orig_tweeter_name)
                            <p>Retweet from @ {{$tweet->orig_tweeter_name}}<img class="img-fluid" style="width: 30px;" src="{{ url('/logo.png')}}" alt="The Great Ironic Eagle"></p>
                        @endif
                    <h6>{{$tweet->content}}</h6>
                        @if($tweet->tweet_photo)
                            <img class="img-fluid" style="width:200px" src="{{$tweet->tweet_photo}}" alt="dank memes">
                        @endif
                    <p class="text-muted">{{$tweet->created_at->diffForHumans()}}</p>
                    <div class="row px-3">
                        @if(Auth::user()->id == $tweet->user_id)
                            <form class="col-*" action="/tweets/goToEdit/{{$tweet->user_id}}" method="get">
                                @csrf
                                <button class="btn btn-dark my-2" type="submit" name="edit" value="{{$tweet->id}}">Edit</button>
                            </form>
                            <form action="/tweets/destroy/" method="post">
                                @csrf
                                <button class="btn btn-dark my-2" type="submit" name="id" value="{{$tweet->id}}" onclick="Are you sure?">Delete</button>
                            </form>
                        @else
                            <form class="col-* m-1" action="/retweet" method="post">
                                @csrf
                                <input type="text" name='tweet_id' value="{{$tweet->id}}" class="d-none" readonly>
                                <input type="text" name="name" value="{{getUserName($tweet->user_id)}}" class="d-none" readonly>
                                <input type="text" name="content" value="{{$tweet->content}}" class="d-none" readonly>
                                <input type="text" name="created_at" value="{{$tweet->created_at}}" class="d-none" readonly>
                            <input type="text" name="tweet_photo" value="{{$tweet->tweet_photo}}" class="d-none" readonly>
                                <button type="submit" class="btn btn-secondary my-2">Retweet</button>
                            </form>

                        @endif
                        <form class="col-* m-1" action="/tweets/view/{{$tweet->id}}" method="get">
                            @csrf
                            <button class="btn btn-primary my-2" type="submit" name="id">View</button>
                        </form>
                        @include('likes')
                    </div>
{{-- @include('comments.show')
@include('comments.create') --}}
                    @foreach ($comments[0] as $comment)

                        @foreach ($comment as $content)

                            @if($content->tweet_id == $tweet->id)
                                <div class="card mb-3 p-3">
                                    <a href="/user/{{$content->user_id}}">@ {{getUserName($content->user_id)}}</a>
                                    <p>{{$content->content}}</p>
                                </div>
                            @endif

                    @endforeach

                <div class="col-*">
                    {{-- @include('comments.edit') --}}
                </div>

                @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
