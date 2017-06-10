<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>

	<link href="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/admin/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('public/admin/css/styles.css')}}" rel="stylesheet">
</head>
<body>
	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		@include('errors.notes')
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post">
						{{csrf_field()}}
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>

							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
							<button type="submit" name="submit" class="btn btn-primary">Đăng Nhập</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
</body>
</html>
