<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <h5>@ {{$user[0]->name}}</h5>
        </div>

        @if(Auth::user()->name == $user[0]->name)
        {{-- if own profile display nothing --}}
        @elseif(checkFollowing($user[0]->id, $follows))
        {{-- if you already follow user show nothing --}}
        <form action="/user/unfollow" method="post">
            @csrf
            <button class="btn btn-danger" type="submit" name="followedID" value="{{$user[0]->id}}">Unfollow {{$user[0]->name}}</button>
            </form>
        @else
        <form class="col-sm-6 align-self-start" action="/user/follow" method="post">
            @csrf
            <button class="btn btn-primary" type="submit" name="followId" value="{{$user[0]->id}}">Follow</button>
        </form>

        @endif
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
    </div>

@endif
</div>
