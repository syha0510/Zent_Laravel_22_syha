@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Danh sách người dùng</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Tài khoản</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Ngày sinh</th>
                <th>Trạng thái</th>
                <th >Mô tả</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>183</td>
                <td>Sỹ Hà</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Hoạt động</span></td>
                <td>Sinh viên Học viện Nông Nghiệp Việt Nam</td>
                <td><a  style="margin-right:10px;" href="{{route('backend.users.edit',1)}}" class="btn btn-warning ">Sửa </a><a href="" class="btn btn-danger">Xóa </a></td> 
               
              </tr>
              <tr>
                <td>219</td>
                <td>Xuân Xếp</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-warning">Hoạt động</span></td>
                <td>Sinh viên Học viện Nông Nghiệp Việt Nam</td>
                <td><a style="margin-right:10px;" href="{{route('backend.users.edit',1)}}" class="btn btn-warning ">Sửa </a><a href="" class="btn btn-danger">Xóa</a></td>
              </tr>
              <tr>
                <td>657</td>
                <td>Đình Nghĩa</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-primary">Hoạt động</span></td>
                <td>Sinh viên Học viện Nông Nghiệp Việt Nam</td>
                <td><a style="margin-right:10px;" href="{{route('backend.users.edit',1)}}" class="btn btn-warning ">Sửa</a><a href="" class="btn btn-danger">Xóa</a></td>
              </tr>


            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  
</div>
@endsection