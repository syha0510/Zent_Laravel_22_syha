@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tạo mới thẻ</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Tạo mới</li>
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
                <div class="card-header">
                    <h3 class="card-title">Tạo mới </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('backend.tags.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thẻ</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Tên thẻ">
                        </div>
                        @error('name')
                          <span style="color:red;margin-bottom:8px;display:block;margin-left:8px;"> {{ $message }} </span> 
                        @enderror
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        
                        <a href="{{ route('backend.tags.list') }}" type="reset" class="btn btn-default">Huỷ bỏ</a>
                        <button  type="submit" class="btn btn-success mt-3 float-right mr-6">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection