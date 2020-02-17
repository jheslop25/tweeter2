<div class="card">
    <form class="form-inline p-3" action="/tweets/comment/create" method="post">
        @csrf
        <input type="text" name="user_id" value="{{$tweet->user_id}}" class="d-none" readonly>
        <input class="form-control text-muted w-75" type="text" name="comment" value="Make a comment">
        <input type="number" name="tweetId" value="{{$tweet->id}}" readonly class="d-none">
        <button class="btn btn-primary m-2" type="submit">Comment</button>
    </form>
</div>
