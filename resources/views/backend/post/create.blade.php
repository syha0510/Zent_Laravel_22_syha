@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tạo mới bài viết</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Tạo mới bài viết</li>
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
                {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif --}}

                <form role="form" method="post" action="{{route('backend.posts.store')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input name="title" type="text" class="form-control" id="" placeholder="Tiêu đề" >
                            @error('title')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung</label>
                            <textarea  cols="30" rows="10" class="textarea" name="content" placeholder="Place some text here"
                                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                              @error('content')
                                <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                              @enderror
                        </div>
                        
                      
                        <div class="col-sm-12">
                          <!-- Select multiple-->
                          <div class="form-group">
                            <label>Thẻ</label>
                            <select data-live-search="true" id="card" multiple class="form-control" name="tags[]" >
                              @foreach ($tags as $item )
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-group " style="display:flex;justify-content: space-between">
                          <div style="width:100%" >
                            <label>Danh mục</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
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
                      <div class="form-group">
                        <label for="exampleInputFile">Tải lên ảnh</label>
                        <div class="input-group">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id='anh'>
                        <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                        </div>
                        <div class="input-group-append">
                        <span class="input-group-text">Tải lên</span>
                        </div>
                        </div>
                      </div>

                      <div class="gallery mt-5" style="display: flex; flex-wrap: wrap;"></div>
                      @error('image')
                          <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                       @enderror


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-success mt-3 float-right mr-6">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<script>
  function previewImages()
{
    var gallery = document.querySelector('.gallery');

    if(this.files)
    {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file)
    {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name))
        {
            return alert(file.name + " is not an image");
        }

        var reader = new FileReader();

        reader.addEventListener("load", function() {
          var image = new Image();
          image.width = 150;
          image.height = 150;
          image.title  = file.name;
          image.src = this.result;
          gallery.appendChild(image);
        });

        reader.readAsDataURL(file);


    }
    
}
    
  document.querySelector('#anh').addEventListener("change", previewImages);
</script>

@endsection