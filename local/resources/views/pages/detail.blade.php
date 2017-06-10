@extends('welcome')
@section('title','Chi tiết sản phẩm')
@section('content')
	<div class="row list-product">
		<div class="col-md-12">
			<div class="clearfix"></div>
			<h3>{{$chitiet->pro_name}}</h3>
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-4 text-center">
				<img width="100%" height="450px" src="{{asset('public/admin/product/'.$chitiet->pro_img)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-8">
				<p>Giá: <span class="price">{{number_format($chitiet->pro_price,0,',','.')}} VND</span></p>
				<p>Bảo hành: {{$chitiet->pro_baohanh}}</p> 
				<p>Phụ kiện: {{$chitiet->pro_phukien}}</p>
				<p>Tình trạng:{{$chitiet->pro_tinhtrang}}</p>
				<p>Khuyến mại: {{$chitiet->pro_khuyenmai}}</p>
				<p>Còn hàng: 
					@if($chitiet->pro_trangthai == 1)
						{{'Còn hàng'}}
					@else
						{{'Hết hàng'}}
					@endif
				</p>
				<p class="add-cart text-center"><a href="{{asset('mua-hang/'.$chitiet->id)}}">Đặt hàng online</a></p>
			</div>
		</div>
	</div>
	<div class="row list-product">
		<div class="col-md-12">
			<h3>Chi tiết sản phẩm</h3>
			<p class="text-justify">{!! $chitiet->pro_content !!}</p>
		</div>
	</div>
	@if(Auth::guard('customer')->check())
		<h2>Xin chào : <span style="color: red">{{Auth::guard('customer')->user()->name}}</span><br>
			<small>Bạn có thể đăng bình luận</small>
			<br>
			<a href="{{asset('dang-xuat')}}" class="btn btn-primary">Đăng Xuất</a>
		</h2>
		<div class="row list-product">
			<div class="col-md-12">
				<h3>Bình luận</h3>
				<div class="col-md-9 comment">
					<form method="post" action="{{asset('binh-luan/'.$chitiet->id)}}">
					{{csrf_field()}}
						<div class="form-group">
							<label for="binhluan">Bình luận:</label>
							<textarea required rows="10" name="binhluan" class="form-control"></textarea>
						</div>
						<div class="form-group text-right">
							<button type="submit" name="submit" class="btn btn-default">Gửi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@else
		<h2 class="text-danger">
			Bạn phải đăng nhập để có thể bình luận
		</h2>
		<br>
		<small><a href="{{asset('dang-nhap')}}" class="btn btn-primary">Đăng Nhập</a></small>
		<small><a href="{{asset('dang-ky')}}" class="btn btn-primary">Đăng Ký</a></small>
	@endif
	<div class="row list-product">
		<div class="col-md-12 comment-list">
			<div class="col-md-9 comment">
				@foreach($comment as $cm)
					<ul>
						<li class="com-title">
							{{$cm->customer->name}}
							<br>
							{{$cm->customer->email}}
							<br>
							<span>{{$cm->created_at}}</span>	
						</li>
						<li class="com-details">
							{!!$cm->content!!}
						</li>
					</ul>
				@endforeach
			</div>
		</div>
		<div class="pagination">
			{{$comment->links()}}
		</div>
	</div>
@stop