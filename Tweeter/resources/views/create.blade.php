
    <div class="card p-3 container">
        <form class="form-inline p-3" action="/tweets/create" method="post">
            @csrf
            {{-- <div class="form-row"> --}}
                <input class="form-control w-50" type="text" name="content" value="@ {{Auth::user()->name}} ~ what's on your mind?">
                <button class="btn btn-primary m-2" type="submit">publish your tweet!</button>
                <img class="img-fluid" style="width: 60px;" src="{{ url('/logo.png')}}" alt="The Great Ironic Eagle">
            {{-- </div> --}}
        </form>
    </div>
    @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
