<div class="card">
    <form class="form-inline m-3 p-3" action="/user/photo" method="post" enctype="multipart/form-data">
        @csrf
        <label for="myPhoto" class="btn btn-secondary">Select photo
        <input class="d-none" type="file" id='myPhoto' name="myPhoto">
    </label>
        <input type="text" name="user_id" value="{{$user[0]->id}}" readonly class="d-none">
        <button type="submit" class="btn btn-dark ml-2">Upload</button>
    </form>
</div>

