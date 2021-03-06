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

                        <form  method="GET" action="{{ route('backend.users.list')}}" style="display:inline-flex;margin-left:77%"  >
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input value="{{ request()->get('name')}}" type="text" name="name" class="form-control float-right"
                                    placeholder="Tìm kiếm">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
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
                                    <th>Tên người dùng</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $key=>$user )
                              <tr>
                                <td>{{$key+1}}</td>
                                <td><a href="{{ route('backend.users.show',$user->id ) }}">{{$user->name}}</a></td>
                                <td>
                                    @if(!empty($user->image))
                                        <img src="{{ Illuminate\Support\Facades\Storage::disk($user->disk)->url($user->image)}}"
                                        width="80px" height="50px">
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ( $user->address == null )
                                        Đang cập nhật
                                    @else
                                    {{ $user->address }}  
                                    @endif
                                </td>
                                <td>

                                    @if ($user->phone == null)
                                        Đang cập nhật
                                    @else
                                    {{ $user->phone }}
                                    @endif

                                </td>
                              <td class="text-center">
                                <span class="tag tag-success">
                                  @if ($user->status==0)
                                    <a href="{{ route('backend.users.lock', $user->id ) }}"  class="fas fa-lock " ></a>
                                  @else
                                    <a href="{{ route('backend.users.lock', $user->id) }}" class="fas fa-unlock " ></a>
                                  @endif  
                                </span>
                              </td>
                                
                                <td class="text-center">
                                    <a style="margin-right:10px;" href="{{ route('backend.users.edit', $user->id ) }}"
                                        class="btn btn-primary "><i class="fas fa-edit"></i> 
                                    </a>

                                    <form style="display: inline-block;margin-right:8px" method="POST" action="{{ route('backend.users.login', $user->id )}}">
                                        @csrf
                                        <button class="btn btn-outline-danger">
                                          <i class="fas fa-user"></i>
                                        </button>
                                      </form>

                                    @if($user->id != auth()->user()->id)
                                       <form style="display: inline-block" method="POST" action="{{route('backend.users.delete',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="" class="btn btn-danger delete-confirm" data-name="{{ $user->name }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </form> 
                                    @endif
                                    
                                        {{-- <a   style="margin-right:10px;" href="{{ route('backend.users.delete', $user->id ) }}"
                                            class="btn btn-danger"><i class="fas fa-trash"></i> 
                                        </a> --}}
                                
                              </tr>
                              @endforeach
                                


                            </tbody>


                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $users->appends(request()->input())->links() !!}
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
        var showstatus = document.getElementsByClassName('showstatus');
                console.log(showstatus)          
                var formshow = document.getElementsByClassName('formshow');
                
                //console.log(formshow)
                for(let i=0;i< showstatus.length;i++){
                    showstatus[i].addEventListener('click',function(){
                        formshow[i].submit();
                    })
                }



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
