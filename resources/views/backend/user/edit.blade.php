@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Content Header -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">Chỉnh sửa người dùng</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Chỉnh sửa</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- Content -->
<div class="container-fluid">
    <!-- Main row -->
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('backend.users.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Tên người dùng" value="{{ $user->name }}">
                        </div>

                        @error('name')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="email" class="form-control" id="" placeholder="Email" value="{{ $user->email }}">
                        </div>

                        @error('email')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input name="password" type="password" class="form-control" id="">
                        </div>

                        @error('password')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror

                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input name="address" type="text" class="form-control" id="" placeholder="Địa chỉ" value="{{ $user->address }}">
                        </div>

                        @error('address')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input name="phone" type="text" class="form-control" id="" placeholder="Số điện thoại" value="{{ $user->phone }}">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control select2" style="width: 100%;" name="roles">
                              @foreach ( $roles as $role )
                                <option value="{{ $role->id }}" >{{ $role->name }}</option>
                              @endforeach
                            </select>
                        </div>
                         --}}
                        <div class="form-group">
                            <label for="exampleInputFile">Tải lên ảnh</label>
                            <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="uploadFile" value="{{ $user->image }}">
                            <label class="custom-file-label" for="exampleInputFile">Chọn file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Tải lên</span>                        
                            </div>
                            
                            </div>
                            {{-- <div class="gallery mt-5" style="display: flex; flex-wrap: wrap;"></div> --}}
                            @if(!empty($user->image))
                                <img id="anh" src="{{ Illuminate\Support\Facades\Storage::disk($user->disk)->url($user->image)}}"
                                width="100px" height="100px" style="margin-top:20px;">
                            @endif
                        </div>
                         
                        
                        @error('image')
                            <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                         @enderror
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
<script>
    function previewImages()
  {
      var anh = document.querySelector('#anh');
  
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
            // var image = new Image();
            // image.width = 150;
            // image.height = 150;
            // image.title  = file.name;
            anh.src = this.result;
            anh.style.display = 'block';
            // preview.appendChild(image);
          });
  
          reader.readAsDataURL(file);
  
  
      }
      
  }
      
    document.querySelector('#uploadFile').addEventListener("change", previewImages);
  </script>
@endsection