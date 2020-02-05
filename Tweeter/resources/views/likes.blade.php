
@if(hasLiked($tweet->id, Auth::user()->id))
<form action="/tweets/unlike" method="post">
    @csrf
<button type="submit" name="like" value="{{$tweet->id}}">Unlike This Tweet</button>
</form>
@else
<form action="/tweets/likes" method="post">
    @csrf
<button type="submit" name="like" value="{{$tweet->id}}">Like This Tweet</button>
</form>
@endif
