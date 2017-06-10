@extends('welcome')
@section('title','Đăng Nhập')
@section('content')
	<div class="row list-product">
		<div class="col-md-12">
			@include('errors.notes')
			<div class="panel panel-default">
			  	<div class="panel-heading">Đăng nhập</div>
			  		<div class="panel-body">
				    	<form action="" method="POST">
				    	{{csrf_field()}}
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password">
							</div>
							<br>
							<button type="submit" name="submit" class="btn btn-default">
								Đăng nhập
							</button>
				    	</form>
			  	</div>
			</div>
		</div>
	</div>
@stop