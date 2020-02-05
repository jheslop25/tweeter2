<form action="/tweets/comment/create" method="post">
    @csrf
    <input type="text" name="comment" value="make a comment">
<input type="number" name="tweetId" value="{{$tweet->id}}" readonly>
    <button type="submit">Comment</button>
    {{-- will add edit/ delete buttons here later --}}
</form>
