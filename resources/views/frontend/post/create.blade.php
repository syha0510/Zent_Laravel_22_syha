<form method="post" action="{{route('backend.posts.store')}}">
    @csrf
    <input type="text" name="name" placeholder="Tên user">
    <input type="submit" value="Submit">
</form>