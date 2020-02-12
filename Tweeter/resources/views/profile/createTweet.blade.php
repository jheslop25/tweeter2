<div class="container">
    <form class="card row mx-2 p-2" action="/tweets/create" method="post" id="create">
    @csrf
    <textarea class="form-control" form="create" name="content" rows="2" cols="50">What's on your mind?</textarea>
    {{-- <input type="text" name="content" value="what's on your mind?"> --}}
        <button class="btn btn-primary m-4" type="submit">Publish</button>
    </form>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
