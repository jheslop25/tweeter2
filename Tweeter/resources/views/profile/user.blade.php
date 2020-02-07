<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h5>User: {{$user[0]->name}}</h5>
        </div>
@if (Auth::user()->name == $user[0]->name)
        <div class="col-sm-8">
            <h6>Your email is: {{Auth::user()->email}}</h6>
        </div>
    </div>
    <div class="card p-2">
        <form class="row" action="/user/edit" method="post">
            @csrf
            <div class="col-sm">
                <p class="h6 text-muted">Update your name</p>
                <input class="form-control" type="text" name="name" value="{{$user[0]->name}}">
            </div>
            <div class="col-sm">
                <p class="h6 text-muted">Update your email</p>
                <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}"><br>
            </div>
            <div class="col-sm align-self-center">
                <button class="btn btn-dark" type="submit">Update Account</button>
            </div>
        </form>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <form class="col-sm-3 align-self-center my-3 mb-5 ml-3" action="/user/destroy/{{Auth::user()->id}}" method="get">
            @csrf
            <button class="btn btn-danger" type="submit">Delete My Account</button>
        </form>
        <form class="col-sm-6 align-self-center  my-3 mb-5" action="/user/follow">
            @csrf
            <button class="btn btn-primary" type="submit" name="FolowId" value="{{$user[0]->user_id}}">Follow</button>
        </form>
    </div>

@endif
</div>
