<div class="row justify-content-center">
@if(hasLiked($tweet->id, Auth::user()->id))
<form class="col" action="/tweets/unlike" method="post">
    @csrf
<button class="btn btn-dark my-2" type="submit" name="like" value="{{$tweet->id}}">Unlike</button>
</form>
@else
<form class="col" action="/tweets/likes" method="post">
    @csrf
<button class="btn btn-success my-2" type="submit" name="like" value="{{$tweet->id}}">Like</button>
</form>
@endif
<p class="h6 col-12 text-muted mt-3">Likes: {{getLikes($tweet->id)}}</p>
</div>
{{-- @php
    var_dump(getLikes($tweet->id));
@endphp --}}
