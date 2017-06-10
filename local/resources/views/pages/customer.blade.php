@extends('welcome')
@section('title','Đăng ký')
@section('content')
	<div class="row list-product">
		<div class="col-md-12">
		@include('errors.notes')
			<div class="panel panel-default">
		  	<div class="panel-heading">Thông tin tài khoản</div>
		  	<div class="panel-body">
			  	@include('errors.notes')
			  	<form action="" method="POST">
			  		{{csrf_field()}}
		    		<div>
		    			<label>Họ tên</label>
					  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" readonly="" value="{{$customer->name}}">
					</div>
					<br>
					<div>
		    			<label>Email</label>
					  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
					  	readonly value="{{$customer->email}}" 
					  	>
					</div>
					<br>	
					<div>
                    	<label>Nhập mật khẩu mới</label>
					  	<input type="password" class="form-control password" name="password" placeholder="Please Enter Pass" />
					</div>
					<br>
					<div>
		    			<label>Nhập lại mật khẩu mới</label>
                    	<input type="password" class="form-control password" name="re-password" placeholder="Please Enter Re-Pass" />
					</div>
					<br>
					<button type="submit" name="submit" class="btn btn-primary">Sửa tài khoản
					</button>
		    	</form>
		  	</div>
		</div>
		</div>
	</div>
@stop