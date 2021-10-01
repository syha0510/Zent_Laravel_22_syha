@extends("backend.layouts.master")
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Danh sách danh mục</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Danh sách danh mục</li>
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
          <a href="{{ route('backend.categories.create') }}" class="btn btn-success"><i style="margin-right:10px" class="fas fa-plus"></i>Tạo danh mục</a>

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
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Đường dẫn</th>
                <th>Thời gian tạo</th>
                <th>Ngày cập nhật</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $categories as $key=>$category )
              <tr>
                <td>{{ $key+1 }}</td>
                <td> <a href="{{route('backend.categories.show',$category->id)}}">{{$category->name}}</a></td>
                <td>{{ $category->slug }}</td>
                <td>{!! date('d/m/Y', strtotime($category->created_at)) !!}</td>
                <td>{!! date('d/m/Y', strtotime($category->updated_at)) !!}</td>
                <td class="text-center">
                  <a  style="margin-right:10px;" href="{{route('backend.categories.edit', $category->id)}}" class="btn btn-primary "><i class="fas fa-edit"></i> </a>
                  <form style="display: inline-block" method="POST" action="{{route('backend.categories.destroy',$category->id)}}">
                    @csrf
                    @method('DELETE')
                    <button style="" class="btn btn-danger">
                      <i class="fas fa-trash"></i>
                    </button>
                  </form>
                  
                </td>
                
               
              </tr>
              @endforeach
              
             

            </tbody>
          </table>
          <div class="mt-3 float-right mr-5">
            {!! $categories->appends(request()->input())->links() !!}
            {{-- ->appends(request()->input()) --}}
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  
</div>
@endsection