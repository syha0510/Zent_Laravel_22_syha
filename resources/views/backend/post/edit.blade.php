@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Chỉnh sửa bài viết</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Content Header -->

<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('backend.posts.update',$post->id)}}">
                  @csrf
                   
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input name="title" type="text" class="form-control" id="" placeholder="Tiêu đề" value="{{ $post->title }}">
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea  cols="30" rows="10" class="textarea" name="content" placeholder="Vui lòng nhập vào đây">
                                @isset($content)
                                  {{ $post->content }}
                                @endisset
                                
                            </textarea>
                        </div>
                        
                        <div class="form-group " style="display:flex;justify-content: space-between">
                          <div style="width:100%" >
                            <label>Danh mục</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id" >
                                @foreach ( $categories as $category )
                                  <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          {{-- <div style="width:48%">
                            <label>Trạng thái</label>
                            <select class="form-control select2" style="width: 100%;" name="status">
                              @foreach (\App\Models\Post::$status_text as $key => $value)
                                  <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                            </select>
                          </div> --}}
                           
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection