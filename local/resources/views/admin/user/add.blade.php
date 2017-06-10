@extends('admin.layout.index')
@section('title','Thêm Thành Viên')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thành Viên</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			@include('errors.notes')
			<div class="panel panel-primary">
				<div class="panel-heading">Thêm Thành Viên</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Tên thành viên</label>
									<input required type="text" name="name" class="form-control">
								</div>
								<div class="form-group" >
									<label>Mật khẩu</label>
									<input required type="password" name="password" class="form-control">
								</div>
								<div class="form-group" >
									<label>Nhập lại khẩu</label>
									<input required type="password" name="re-password" class="form-control">
								</div>
								<div class="form-group" >
									<label>Địa chỉ email</label>
									<input required type="email" name="email" class="form-control">
								</div>
								<div class="form-group">
									<label>
										<input type="radio" name="level"  value="0"> Member
										<input type="radio" name="level"  value="1" checked="checked">
										Admin
									</label>
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
@stop