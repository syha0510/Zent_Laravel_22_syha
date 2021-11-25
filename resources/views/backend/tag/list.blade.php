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
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách thẻ</li>
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
                        <h3 class="card-title">Thẻ</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Tìm kiếm">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <form style="margin: 20px 0" method="GET" action="{{ route('backend.users.list')}}" class="form-inline"  >
                        <div class="col-3">
                          <input value="{{ request()->get('name')}}" name="name" type="text" class="form-control" placeholder="Nhập tên cần tìm..">
                        </div>
                        <div class="col-3">
                          <input value="{{ request()->get('email')}}" name="email" type="text" class="form-control" placeholder="Nhập email cần tìm">
                        </div>
                        
                        <div style="margin-right: 5px">
                            <button class="btn btn-info">Lọc</button>
                          </div>
                        <div >
                            <a href="{{ route('backend.users.list')}}" class="btn btn-default"> Quay lại</a>
                        </div>
                    </form> --}}
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên thẻ</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($tags as $key=>$tag )
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $tag->name }}</td>
                                <td class="text-center">
                                    <a style="margin-right:10px;" href="{{ route('backend.tags.edit', $tag->id ) }}"
                                        class="btn btn-primary "><i class="fas fa-edit"></i> 
                                    </a>

                                    <form style="display: inline-block" method="POST" action="{{route('backend.tags.destroy',$tag->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="" type="submit" class="btn btn-danger delete-confirm" data-name="{{ $tag->name }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                                


                            </tbody>


                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $tags->appends(request()->input())->links() !!}
                            {{-- ->appends(request()->input()) --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
         $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Bạn có muốn xóa ${name}?`,
                    text: "Nếu bạn xóa nó, bạn sẽ không thể khôi phục lại được",
                    icon: "error",
                    buttons: ["Không", "Xóa"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        }); 
    </script>

    
@endsection
