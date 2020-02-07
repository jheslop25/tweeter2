
@foreach ($tweets as $tweet)
<div class="card my-3 mx-3 p-3">
    <div class="card-title">
    <h4>@ {{$user[0]->name}} "{{$tweet->content}}"</h4>
    </div>
    <div class="row justify-content-start">
@if (Auth::user()->id == $tweet->user_id)
        <form class="col-2 mb-3 mr-2" action="/tweets/goToEdit/{{$tweet->user_id}}" method="get">
            @csrf
            <button class="btn btn-secondary" type="submit" name="edit" value="{{$tweet->id}}">Edit</button>
        </form>
        <form class="col-3 mb-3" action="/tweets/destroy/" method="post">
            @csrf
            <button class="btn btn-secondary" type="submit" name="id" value="{{$tweet->id}}" onclick="Are you sure?">Delete</button>
        </form>
@endif
        <form class="col-3 mb-3" action="/tweets/view/{{$tweet->id}}" method="get">
            @csrf
            <button class="btn btn-primary" type="submit" name="id">View</button>
        </form>
    </div>
</div>
@endforeach

