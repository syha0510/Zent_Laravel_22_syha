<form method="post" action="{{route('backend.posts.update', ['id'=>1])}}">
    @csrf
    <input type="text" name="name" placeholder="Tên user">
    <button type="submit">Chỉnh sửa</button>
</form>