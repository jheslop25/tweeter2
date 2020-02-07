<div class="container">
    <form class="row" action="/tweets/create" method="post" id="create">
    @csrf
    <textarea class="col-sm-8 form-control" form="create" name="content" rows="2" cols="50">What's on your mind?</textarea>
    {{-- <input type="text" name="content" value="what's on your mind?"> --}}
        <button class="col ml-sm-2 btn btn-primary" type="submit">Publish</button>
    </form>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
