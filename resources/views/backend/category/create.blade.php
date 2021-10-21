@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tạo mới danh mục</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Tạo mới danh mục</li>
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
                @endif
                 --}}
                <form role="form" method="post" action="{{route('backend.categories.store')}}">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục</label>
                            <input name="name" type="text" class="form-control" id="" placeholder="Danh mục">

                            @error('name')
                              <div style="margin-top:20px;" class="alert alert-danger"> {{ $message }} </div> 
                            @enderror
                        </div>
                        <div class="form-group" >
                            <label>Trạng thái</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option>--Chọn trạng thái---</option>
                                <option>Hoạt động</option>
                                <option>Không hoạt động</option>
                            </select>
                          </div>
                        
                       
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="reset" class="btn btn-default">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection