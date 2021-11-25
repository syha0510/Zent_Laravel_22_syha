@extends("backend.layouts.master")
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Danh sách bài viết</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách bài viết</li>
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
                        @can('create', App\Models\Post::class)
                        <a href="{{ route('backend.posts.create') }}" class="btn btn-success"><i style="margin-right:10px" class="fas fa-plus"></i>Tạo bài viết</a>
                        @endcan
                        

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
                    <form style="margin: 20px 0" method="GET" action="{{ route('backend.posts.list')}}" class="form-inline"  >
                        <div class="col-3">
                          <input value="{{ request()->get('title')}}" name="title" type="text" class="form-control" placeholder="Nhập dữ liệu cần tìm..">
                        </div>
                        
                        {{-- <div class="col-3">
                          <input value="{{ request()->get('status')}}" name="status" type="text" class="form-control" placeholder=" Nhập trạng thái">
                        </div> --}}

                        <div style="margin-right: 5px">
                            <button class="btn btn-info">Lọc</button>
                          </div>
                        <div >
                            <a href="{{ route('backend.posts.list')}}" class="btn btn-default"> Quay lại</a>
                        </div>
                    </form>
                    <!-- /.card-header -->
                    
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên bài viết</th>
                                    <th class="text-center">Danh mục</th>
                                    <th>Nội dung</th>
                                    <th>Tags</th>
                                    <th>Người tạo</th>
                                    {{-- <th>Người cập nhật</th> --}}
                                    <th class="text-center">Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $key=>$post )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if(!empty($post->image))
                                            <img src="{{ Illuminate\Support\Facades\Storage::disk($post->disk)->url($post->image)}}"
                                            width="80px" height="50px">
                                        @endif
                                    </td>
                                    <td>
                                        <a  href="{{ route('backend.posts.show', $post->id) }}">{{ $post->title }} </a>          
                                    </td>
                                    <td class="text-center">{{ $post->category->name ?? 'Chưa xác định'}}</td>
                                    <td><span class="tag tag-success">{!! $post->content !!}</span></td>
                                    <td>
                                        @foreach ($post->tags as $tag )
                                            <span class="badge badge-info">{{ $tag->name }}</span>
                                        @endforeach

                                    </td>
                                    <td>{{ $post->user->name }}</td>

                                    <td class="text-center">
                                        {{-- {{$post->status_text}} --}}
                                        
                                        <form action="{{ route('backend.posts.updatestatus' , $post->id ) }}" method="POST" class="formshow" 
                                            
                                            @if ($post->status==1)

                                                  title="Hiện"

                                                @else
                                                
                                                title="Ẩn"

                                            @endif  
                                            
                                            >
                                            @csrf
                                            <div class="custom-control custom-switch">
                                              <input   type="checkbox" class="custom-control-input showstatus" id="switch{{$key}}" {{$post->status==1?'checked':''}} >
                                              <label class="custom-control-label" for="switch{{ $key }}" ></label>
                                              
                                            </div>
                                        </form>
                                    </td>
                                    <td>{!! date('d/m/Y', strtotime($post->created_at)) !!}</td>
                                    <td>{!! date('d/m/Y', strtotime($post->updated_at)) !!}</td>
                                    <td class="text-center">

                                        @can('update',$post)
                                        <a style="margin-right:10px;" href="{{ route('backend.posts.edit', $post->id) }}"
                                            class="btn btn-primary "> <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan

                                        @can('delete-post',$post)
                                        <form style="display: inline-block" method="POST" action="{{route('backend.posts.delete',$post->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="" class="btn btn-danger delete-confirm"
                                            data-name="{{ $post->name }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </td>

                                </tr> 
                                @endforeach
                                


                            </tbody>
                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $posts->appends(request()->input())->links() !!}
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
