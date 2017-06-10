<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Giang Shop - @yield('title')</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="{{asset('public/user/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/user/css/home.css')}}">
<link rel="stylesheet" href="{{asset('public/user/css/details.css')}}">
<link rel="stylesheet" href="{{asset('public/user/css/hoanthanh.css')}}">
<script type="text/javascript" src="{{asset('public/user/js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/user/js/timkiem.js')}}">
    
</script>
</head>
<body>
<!-- header -->
<div id="header" class="row">
<div class="container">
    <div id="logo" class="col-xs-6 col-sm-6 col-md-3 text-center">
        <h1>
            <a href="{{asset('/')}}"><img src="{{asset('public/user/img/home/logo.png')}}"></a>
        </h1>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-9">
        <div id="search-bar" class="col-md-6 col-md-offset-1">
            <form class="navbar-form" role="search" method="POST" action="{{asset('tim-kiem')}}">
            {{csrf_field()}}
                <div class="input-group">
                    <div class="input-group-btn">
                        <input type="text" id="timkiem" class="form-control" placeholder="Search" name="timkiem">
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-default" name="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div id="cart" class="col-md-3 col-md-offset-2 text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="display" href="{{asset('cart')}}">Giỏ hàng</a>
            <a href="#">{{Cart::count()}}</a>
        </div>
    </div>
</div>
</div>
<!-- end header -->
<!-- wrap -->
<div id="wrap" class="container">
<div class="row">
    <div id="menu" class="col-md-3">
        <div class="collapse navbar-collapse" id="myNavbar">
        @php 
            $listCat = DB::table('cats')->select('cat_name','id','cat_slug')->get();
        @endphp
            <ul class="nav">
                <li>Danh mục sản phẩm</li>
                @foreach($listCat as $list)
                    <li><a href="{{asset('danh-sach-dm/'.$list->id.'/'.$list->cat_slug)}}.html">{{$list->cat_name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="slide" class="col-md-9">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="{{asset('public/user/img/home/slide.jpg')}}" alt="Chania">
                </div>

                <div class="item">
                  <img src="{{asset('public/user/img/home/slide2.jpg')}}" alt="Chania">
                </div>

                <div class="item">
                  <img src="{{asset('public/user/img/home/slide3.jpg')}}" alt="Flower">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div id="v-banner" class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0 text-center">
        <img src="{{asset('public/user/img/home/v-banner1.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner2.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner3.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner4.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner5.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner6.jpg')}}">
        <img src="{{asset('public/user/img/home/v-banner7.jpg')}}">
    </div>
    <div id="wrap-inner" class="col-md-9">
        <div class="row text-center" id="h-banner">
            <img src="{{asset('public/user/img/home/h-banner2.jpg')}}">
            <img src="{{asset('public/user/img/home/h-banner2.jpg')}}">
        </div>
        <div id="result">