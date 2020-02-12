@if(Auth::user()->id == $comment->user_id)
<form action="/tweets/comment/edit" method="post">
    @csrf
<input class="form-control" type="text" name="comment" value="{{$comment->content}}">
<input type="number" name="tweetId" value="{{$tweet->id}}" readonly class="d-none">
<input type="number" name="commentId" value="{{$comment->id}}" readonly class="d-none">
    <button class="btn btn-dark m-2 mt-3" type="submit">Edit comment</button>
    @error('comment')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- will add edit/ delete buttons here later --}}
</form>

<form action="/tweets/comment/delete" method="post">
  @csrf
<button class="btn btn-danger mb-2 ml-2" type="submit" name="delete" value="{{$comment->id}}">Delete Comment</button>
</form>
@endif
