<div class="container">
    <form class="card row mx-2 p-2" action="/tweets/create" method="post" id="create" enctype="multipart/form-data">
        @csrf
        <textarea class="form-control" form="create" name="content" rows="2" cols="50" placeholder="@ {{Auth::user()->name}} ~ what's on your mind?"></textarea>
        <label for="myPhoto" class="btn btn-secondary my-2">Select photo
            <input class="d-none" type="file" id='myPhoto' name="myPhoto">
        </label>
        <button class="btn btn-primary m-4" type="submit">Publish</button>
    </form>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
