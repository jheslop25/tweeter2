<form class="card p-3" action="/tweets/comment/create" method="post">
    @csrf
    <input type="text" name="user_id" value="{{$tweet->user_id}}" class="d-none" readonly>
    <input class="form-control text-muted" type="text" name="comment" value="Make a comment">
    <input type="number" name="tweetId" value="{{$tweet->id}}" readonly class="d-none">
    <button class="btn btn-primary mt-2" type="submit">Comment</button>
</form>
