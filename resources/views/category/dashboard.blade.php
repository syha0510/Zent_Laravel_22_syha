<h1>Dashboard</h1>
<h2>Category</h2>
<a href="{{ route('backend.categories.list') }}"> Danh mục blog</a>
</br>
</br>
<a href="{{ route('backend.categories.edit', ['id'=>1]) }}">Chỉnh sửa danh mục blog</a>
</br>
</br>
<a href="{{ route('backend.categories.create') }}"> Tạo mới danh mục blog</a>
</br>
</br>
<a href="{{ route('backend.categories.show' , ['id'=>1]) }}"> Xem chi tiết danh mục blog</a>
<h2>Blog</h2>
<a href="{{ route('backend.posts.list') }}"> Bài viết blog</a>
</br>
</br>
<a href="{{ route('backend.posts.edit', ['id'=>1]) }}">Chỉnh sửa bài viết blog</a>
</br>
</br>
<a href="{{ route('backend.posts.create') }}"> Tạo mới bài viết blog</a>
</br>
</br>
<a href="{{ route('backend.posts.show' , ['id'=>1]) }}"> Xem chi tiết bài viết blog</a>