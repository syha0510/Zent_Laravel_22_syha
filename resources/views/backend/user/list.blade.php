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
                    <form style="margin: 20px 0" method="GET" action="{{ route('backend.users.list')}}" class="form-inline"  >
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
                    </form>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người dùng</th>
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
                                <td>{{ $user->email }}</td>
                                <td> {{ $user->userInfo->address }} </td>
                                <td> {{ $user->userInfo->phone }}  </td>
                              <td class="text-center">
                                <span class="tag tag-success">
                                  @if ($user->status==0)
                                    <i  class="fas fa-lock " ></i>
                                  @else
                                    <i class="fas fa-unlock text-primary"></i>
                                  @endif  
                                </span>
                              </td>
                                
                                <td class="text-center">
                                    <a style="margin-right:10px;" href="{{ route('backend.users.edit', $user->id ) }}"
                                        class="btn btn-primary "><i class="fas fa-edit"></i> 
                                    </a>
                                    <form style="display: inline-block" method="POST" action="{{route('backend.users.destroy',$user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button style="" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </form>
                                
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
@endsection
