<div class="col-* m-1">
    <div class="row justify-content-center">
        @if(hasLiked($tweet->id, Auth::user()->id))
            <Like class="col mt-1" :tweetid={{$tweet->id}} hasliked="false">
        @else
            <Like class="col mt-1" :tweetid={{$tweet->id}} hasliked="true">
        @endif
    </div>
</div>
