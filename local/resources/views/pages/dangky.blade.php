@extends('welcome')
@section('title','Đăng ký')
@section('content')
	<div class="row list-product">
		<div class="col-md-12">
		@include('errors.notes')
			<form action="" method="POST" role="form">
			{{csrf_field()}}
				<legend>Đăng Ký Thành Viên</legend>
			
				<div class="form-group">
					<label for="">Tên tài khoản</label>
					<input required="" type="text" name="member" class="form-control"  placeholder="">
				</div>
				<div class="form-group">
					<label for="">Mật khẩu</label>
					<input required="" type="password" name="password" class="form-control"  placeholder="">
				</div>
				<div class="form-group">
					<label for="">Nhập lại mật khẩu</label>
					<input required="" type="password" name="re-password" class="form-control"  placeholder="">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input required="" type="email" name="email" class="form-control"  placeholder="">
				</div>
				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@stop