<form class="card m-3 p-3 w-25" action="/user/photo" method="post" enctype="multipart/form-data">
    @csrf
    <label for="myPhoto">Select a profile photo:</label>
    <input  type="file" id='myPhoto' name="myPhoto" >
    <input type="text" name="user_id" value="{{$user[0]->id}}" readonly class="d-none">
    <button type="submit" class="btn btn-dark">Upload</button>
</form>
