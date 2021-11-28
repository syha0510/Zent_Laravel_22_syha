@extends("backend.layouts.master")
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chỉnh sửa thông tin người dùng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard.index') }}">Trang chủ</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
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
					<div class="col-8">
						<form role="form" action="{{ route('backend.users.profileUpdate',$user->id) }}" method="POST" name="myForm">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Tên</label><span
										class="requie">*</span>
									<input type="text" class="form-control" id=""
										name="name" placeholder="Tên người dùng"
										value="{{ $user->name }}">
								</div>



								<div class="row">
									<div class="form-group col-6">
										<label for="exampleInputEmail1">Số điện
											thoại</label><span
											class="requie">*</span>
										<input type="text" class="form-control"
											id="" name="phone"
											placeholder="Số điện thoại người dùng"
											value="{{ $user->phone }}">
									</div>

									<div class="form-group col-6">
										<label for="exampleInputEmail1">Địa chỉ
										</label>
										<input type="text" class="form-control"
											id="" name="address"
											placeholder="Địa chỉ người dùng"
											value="{{ $user->address }}">
									</div>
								</div>

							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<a href="{{ route('backend.users.show',$user->id) }}"
									class="btn btn-dark">Huỷ bỏ</a>
								<button type="submit" class="btn btn-success">Cập
									nhật</button>
							</div>
						</form>
					</div>
					<div class="col-4">
						<div class="fileinput-new thumbnail">
							@if($user->image)
							<img src="{{ \Illuminate\Support\Facades\Storage::url($user->image) }}"
								id="change_img" data-img="{{ $user->image }}">
							@else
							<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/OOjs_UI_icon_userAvatar-constructive.svg/1024px-OOjs_UI_icon_userAvatar-constructive.svg.png"
								alt="" id="change_img">
							@endif
						</div>
						<form action="{{ route('backend.user.update-profile-avatar',$user->id) }}" method="POST" enctype='multipart/form-data'>
						@csrf
							<span class="btn btn-default btn-file">
								<span class="fileinput-new"> Chọn Ảnh Đại Diện </span>
								<input id="uploadFile" type="file" name="image">
							</span>
							<input type="submit" id="save" class="btn btn-primary success" value="Cập nhật">
							<input type="reset" id="cancel" class="btn btn-danger" value="Hủy">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<style>
.row_2 {
	padding-top: 1%;
}

.thumbnail {
	width: 334px;
	height: 150px;
	display: inline-block;
	margin-bottom: 5px;
	overflow: hidden;
	text-align: center;
	vertical-align: middle;
	padding: 4px;
	line-height: 1.42857;
	background-color: #fff;
	border: 1px solid #ddd;
	border-radius: 4px;
}

.thumbnail>#change_img {
	max-height: 100%;
	display: block;
	max-width: 100%;
	height: auto;
	margin-left: auto;
	margin-right: auto;
}

.requie {
	color: red;
}

.btn-file > input {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    font-size: 23px;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
    direction: ltr;
}

input[type=file] {
    display: block;
}

#cancel{
	width: 60px;
	display: none;
}

.success{
	width: 100px;
	display: none;
}

.hidden{
	/* opacity: 0; */
}

.ts{
	display: flex;
	align-items:center;
	position: relative;
}

.loc{
	width: 15px;
	height: 15px;
	display: inline-block;
	/* background:blue; */
	margin:0;
	position: absolute;
	right: 0;
	border: 1px solid rgba(0,0,0,.25);
   	border-radius: 50%;
}
</style>

<script>

function previewImages() {
	var preview = document.querySelector('.gallere');
	var change_img = document.querySelector('#change_img');
	var save = document.querySelector('#save');
	var cancel = document.querySelector('#cancel');
	if (this.files) {
		[].forEach.call(this.files, readAndPreview);
	}

	function readAndPreview(file) {
		if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
			return alert(file.name + " is not an image");
		}
		var reader = new FileReader();
		reader.addEventListener("load", function() {
			// var image = new Image();
			// image.width = 150;
			// image.height = 150;
			// image.title = file.name;
			// image.src = this.result;
			// preview.appendChild(image);
			change_img.src = this.result;
			save.style.display = 'inline-block';
			cancel.style.display = 'inline-block';

			// console.log(t);
		});
		reader.readAsDataURL(file);
	}
}


document.querySelector('#uploadFile').addEventListener("change", previewImages);
</script>
@endsection