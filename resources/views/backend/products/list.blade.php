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
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                        <h3 class="card-title">Sản phẩm</h3>

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
                    <div class="card-body table-responsive p-0" >
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Giá gốc</th>
                                    <th>Giá bán</th>
                                    <th>Người tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($products as $key=>$product )
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if(count($product->images) > 0)
                                        <img src="{{ $product->images[0]->image_url }}"
                                        width="80px" height="50px">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ $product->category->name ?? 'Không có danh mục'}}
                                </td>
                                <td>{{ number_format($product->origin_price).'đ' }}</td>
                                <td>{{ number_format($product->sale_price).'đ' }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->status_text }}</td>
                                <td>{!! date('d/m/Y', strtotime($product->created_at)) !!}</td>
                                <td>
                                    
                                    <a style="margin-right:10px;" href="{{ route('backend.products.edit',$product->id) }}"
                                        class="btn btn-primary "> <i class="fas fa-edit"></i>
                                    </a>

                                    <form style="display: inline-block" method="POST" action="{{ route('backend.products.destroy',$product->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="" class="btn btn-danger delete-confirm"
                                        data-name="{{ $product->name }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                                


                            </tbody>


                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $products->appends(request()->input())->links() !!}
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
