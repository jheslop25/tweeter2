<div class="container">
    <div class="row">
        <div class="col-sm-3">
            @if($user[0]->profile_photo)
                <img class="img-fluid" src="<?php echo(asset($profilePic));?>" alt="profile photo">
            @endif
            <h5>@ {{$user[0]->name}}<img class="img-fluid" style="width: 30px;" src="{{ url('/logo.png')}}" alt="The Great Ironic Eagle"></h5>
        </div>
            @if(Auth::user()->name == $user[0]->name)
                {{-- if own profile display nothing --}}
            @elseif(checkFollowing($user[0]->id, $follows))
                {{-- if you already follow user show nothing --}}
            <form action="/user/unfollow" method="post">
                @csrf
                <button class="btn btn-danger ml-3" type="submit" name="followedID" value="{{$user[0]->id}}">Unfollow {{$user[0]->name}}</button>
            </form>
            @else
            <form class="col-sm-6 align-self-start" action="/user/follow" method="post">
                @csrf
                <button class="btn btn-primary" type="submit" name="followId" value="{{$user[0]->id}}">Follow</button>
            </form>
            @endif
    </div>
    @if (Auth::user()->name == $user[0]->name)
        <div class="card p-2 my-2">
            <form class="row " action="/user/edit" method="post">
                @csrf
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <p class="h6 text-muted">Update your name</p>
                    <input class="form-control" type="text" name="name" value="{{$user[0]->name}}">
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <p class="h6 text-muted">Update your email</p>
                    <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}"><br>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <button class="btn btn-dark" type="submit">Update Account</button>
                </div>
            </form>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form class="my-2" action="/user/destroy/{{Auth::user()->id}}" method="get">
                @csrf
                <button class="btn btn-danger" type="submit">Delete My Account</button>
            </form>
        </div>
    @endif
</div>
