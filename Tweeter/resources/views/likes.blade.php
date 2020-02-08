
@if(hasLiked($tweet->id, Auth::user()->id))
<form action="/tweets/unlike" method="post">
    @csrf
<button class="btn btn-dark m-2" type="submit" name="like" value="{{$tweet->id}}">Unlike</button>
</form>
@else
<form action="/tweets/likes" method="post">
    @csrf
<button class="btn btn-success m-2" type="submit" name="like" value="{{$tweet->id}}">Like</button>
</form>
@endif
<p>Likes: {{getLikes($tweet->id)}}</p>
{{-- @php
    var_dump(getLikes($tweet->id));
@endphp --}}
