<form class="card p-3" action="/tweets/comment/create" method="post">
    @csrf
    <input class="form-control text-muted" type="text" name="comment" value="Make a comment">
    <input type="number" name="tweetId" value="{{$tweet->id}}" readonly class="d-none">
    <button class="btn btn-primary mt-2" type="submit">Comment</button>
</form>
