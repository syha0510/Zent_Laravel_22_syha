@extends("backend.layouts.master")
@section('content-header')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			
		</div><!-- /.col -->
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thông tin</li>
				<li class="breadcrumb-item active">{{ $user->name }}</li>
			</ol>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- Content -->
<div class="container-fluid">
	<!-- Main row -->
	<div class="row main_row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Thông tin người dùng</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<div class="row row_2">
					<div class="col-12 col-md-6 col-sm-12 img_user">
						@if($user->image)
						<img src="{{ \Illuminate\Support\Facades\Storage::url($user->image) }}"
							id="change_img" data-img="{{ $user->image }}">
						@else
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/OOjs_UI_icon_userAvatar-constructive.svg/1024px-OOjs_UI_icon_userAvatar-constructive.svg.png"
							alt="" id="change_img">
						@endif
					</div>
					<div class="col-12 col-md-6 col-sm-12 text-sm-center text-md-left">
						<div class="row">
							<div class="col-12">
								<h2>{{ $user->name }} 
									@if ($user->gender == 0)
										<span> <i class="fa fa-mars" style="color:#009deb"></i> </span>
									@elseif ($user->gender == 1)
										<span> <i class="fa fa-venus" style="color:#ff70b8"></i> </span>
									@else
										<span> <i class="fa fa-transgender-alt"></i> </span>
									@endif
								</h2>
							</div>
							<div class="col-12" id="address">
								@if ($user->address)
									{{ $user->address }} 
								@else
									Đang cập nhật
								@endif
								
								<i class="fa fa-map-marker" style="margin-left:5px;color:gray;"></i> 
							</div>
							
							<div style="margin:10px 10px;" class="col-12" data-bs-toggle="tooltip" data-placement="top" title="Email"><i class="fa fa-envelope icon_info" style="color:gray"></i>  {{ $user->email }}</div>
							
							<div style="margin:10px 10px;" class="col-12" data-bs-toggle="tooltip" data-placement="top" title="Số điện thoại"><i class="fa fa-phone icon_info" style="color:gray"></i>
								@if ($user->phone)
									<a href="telto:{{ $user->phone }}">{{ $user->phone }}</a>
								@else
									Đang cập nhật
								@endif
							  	 
							</div>
							
							
						</div>
					</div>
				</div>
                @if ($user->id == Auth::user()->id)
                                <div class="row row_footer">
                                <div class="col-12 col_footer">
                                    <a href="{{ route('backend.users.edit_profile', auth::user()->id) }}"  class="btn btn-primary">Chỉnh sửa thông tin</a>
                                </div>
                            </div>
                            @endif
			</div>
		</div>
	</div>
	<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<style>
	#address{
		color:gray;
		font-size: 12px;
	}

	.row_2{
		padding: 5%;
	}

	#change_img{
		width: 300px;
    		height: 300px;
    		object-fit: cover;
    		border-radius: 50%;
	}

	.img_user{
		text-align:center;
	}

	.main_row{
		width: 70%;
   		margin: auto;
	}

	.icon_info{
		margin-right:2%;
	}

	.row_footer{
		background-color: transparent;
  		border-top: 1px solid rgba(0,0,0,.125);
    		padding: .75rem 1.25rem;
    		position: relative;
    		border-top-left-radius: .25rem;
    		border-top-right-radius: .25rem;
	}

	.col_footer{
		text-align:right;
	}
</style>
@endsection


