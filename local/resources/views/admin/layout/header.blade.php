<!DOCTYPE html>
<html>
<head>
<meta charset ="utf-8">
<meta name    ="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | @yield('title')</title>
	<link href    ="{{asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href    ="{{asset('public/admin/css/datepicker3.css')}}" rel="stylesheet">
	<link href    ="{{asset('public/admin/css/styles.css')}}" rel="stylesheet">
	<script src   ="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
	<script src   ="{{asset('public/admin/js/lumino.glyphs.js')}}"></script>
	</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('admin/index')}}">Vietpro Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{{Auth::user()->name}}<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>							
		</div>
	</nav>		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="{{asset('/')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{asset('admin/product/list')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Sản phẩm</a></li>
			<li><a href="{{asset('admin/cat/list')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Danh mục</a></li>
			<li><a href="{{asset('admin/user/list')}}"><svg class="glyph stroked male-user"><use xlink:href="#stroked-calendar"></use></svg> Thành viên</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
	</div>	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">