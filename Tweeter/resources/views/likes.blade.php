<div class="col-* m-1">
    <div class="row justify-content-center">
        @if(hasLiked($tweet->id, Auth::user()->id))
            {{-- <form class="col" action="/tweets/unlike" method="post">
                @csrf
                <button class="btn btn-dark my-2" type="submit" name="tweetID" value="{{$tweet->id}}">Unlike</button>
            </form> --}}
            <Like class="col mt-1" :tweetid={{$tweet->id}} hasliked="true">
        @else
            {{-- <form class="col" action="/tweets/likes" method="post">
                @csrf
                <button class="btn btn-success my-2" type="submit" name="tweetID" value="{{$tweet->id}}">Like</button>
            </form> --}}
        <Like class="col mt-1" :tweetid={{$tweet->id}} hasliked="false">
        @endif
    </div>
</div>
<p id="likes-counter" class="h6 col-12 text-muted mt-3">Likes: {{getLikes($tweet->id)}}</p>
