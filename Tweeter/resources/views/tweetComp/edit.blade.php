<div class="container">
    <form action="/tweets/update" method="post">
        @csrf
        <input type="number" name="tweet_id" value="{{$tweet['id']}}" readonly class="d-none">
        <input class="form-control" type="text" name="content" value="{{$tweet['content']}}">
        <button class="btn btn-dark m-2" type="submit">edit your tweet!</button>
    </form>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
