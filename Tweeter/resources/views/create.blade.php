<form action="/tweets/create" method="post">
    @csrf
    <input type="text" name="content" value="what's on your mind?">
    <button type="submit">publish your tweet!</button>
    </form>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
