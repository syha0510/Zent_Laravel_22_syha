@extends("backend.layouts.master")
@section('content-header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách sản phẩm</h1>
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
    <style>
        .sortby {
                height: 33px;
                border-radius: 5px;
            }

            .card-tools {
                width: 60% !important;
                display: flex !important;
                justify-content: space-between !important;
            }
    </style>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;margin-left: 59%">
                                <form style="display: flex" autocomplete="off" action="{{ route('backend.products.search') }}" method="get">
                                    @csrf
                                <input type="text" name="keyword" id="keywords" value="{{ Request()->get('keyword') }}" class="form-control float-right" placeholder="Search">
                                <div id="searchajax" style="position: absolute;top:40px;"></div>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" >
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá bán</th>
                                    <th>Người tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($searchs as $key=>$product )
                              <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if(count($product->images) > 0)
                                        <img src="{{ $product->images[0]->image_url }}"
                                        width="80px" height="50px">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->sale_price).'đ' }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->status_text }}</td>
                                <td>{!! date('d/m/Y', strtotime($product->created_at)) !!}</td>
                                <td>
                                    <a  style="margin-right:10px;" data-target="#exampleModalCenter" data-toggle="modal" data-id="{{ $product->id }}" class="btn btn-success detail"> <i class="fas fa-eye"></i>
                                    </a>
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
                            {!! $searchs->appends(request()->input())->links() !!}
                            {{-- ->appends(request()->input()) --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết sản phẩm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h5>Tên sản phẩm : <span style="font-weight: bold" id="nameproduct"></span></h5>
                <hr>
                <h5>Số lượng : <span style="font-weight: bold" id="qtyproduct"></span></h5>
                <hr>
                <h5>Danh mục : <span style="font-weight: bold" id="cateproduct"></span></h5>
                <hr>
                <h5>Thương hiệu : <span style="font-weight: bold" id="brandproduct"></span></h5>
                <hr>
                <h5>Giá gốc : <span style="font-weight: bold"  id="originproduct"></span></h5>
                <hr>
                <h5>Giá bán : <span style="font-weight: bold" id="saleproduct"></span></h5>
                <hr>
                <h5>Người tạo : <span style="font-weight: bold" id="userproduct"></span></h5>
                <hr>
                <h5>Ngày tạo : <span style="font-weight: bold" id="dayproduct"></span></h5>
                <hr>
                <h5>Mô tả : <span style="font-weight: bold" id="contentproduct"></span></h5>
                <hr>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
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
    <script>
        $('.detail').click(function(){
            var id =$(this).data('id');
            // alert(id);
            var _token = $('input[name="_token"]').val();
            $.ajax({
				url: '{{ route('backend.products.show') }}',
				method: 'POST',
				dataType: 'JSON',
				data: {
					id: id,
					_token: _token
				},
				success: function(data) {
					$('#nameproduct').html(data
						.NameProduct);
                    $('#qtyproduct').html(data
						.QtyProduct);
					$('#cateproduct').html(data
						.CategoryProduct);
					$('#brandproduct').html(data
						.BrandProduct);
					$('#originproduct').html(data
						.OriginProduct);
					$('#saleproduct').html(data
						.SaleProduct);
					$('#userproduct').html(data
						.UserProduct);
					$('#dayproduct').html(data
						.DayProduct);
					$('#contentproduct').html(data
						.ContentProduct);
					
				}
			});
        });
    </script>

<script>
    $('#keywords').keyup(function(){
			var query = $(this).val();
      // alert(query);
			if( query != ''){
				var _token = $('input[name = "_token"]').val();
				$.ajax({
					url: "{{ url('/autocomplete-ajax') }}",
					method:"POST",
					data:{query:query,_token:_token},
					success:function(data){
						$('#searchajax').fadeIn();
						$('#searchajax').html(data);
					}
				});
			}else{
				$('#searchajax').fadeOut();
			}
		});
		$(document).on('click','.lisearch',function(){
			$('#keywords').val($(this).text());
			$('#searchajax').fadeOut();
		});
</script>
    
@endsection
