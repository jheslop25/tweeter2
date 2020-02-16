
    <form class="card m-4 p-3" action="/tweets/create" method="post">
        @csrf
        <input class="form-control" type="text" name="content" value="@ {{Auth::user()->name}} ~ what's on your mind?">
        <button class="btn btn-primary m-3" type="submit">publish your tweet!</button>
    </form>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
