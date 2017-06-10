
	<div class="row list-product">
		<div class="col-md-12">
			<div class="clearfix"></div>
			<h3>Tìm kiếm với từ khóa: <span>{!! $timkiem !!}</span></h3>
			@foreach($searchProduct as $item)
				<div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
					<a href="#"><img width="100%" height="300px" src="{{asset('public/admin/product/'.$item->pro_img)}}"></a>
					<p><a href="#">{{$item->pro_name}}</a></p>
					<span>{{number_format($item->pro_price,0,',','.')}} VND</span>
					<div class="hover col-xs-12 col-sm-12 col-md-12">
						<p><a href="{{asset('chi-tiet/'.$item->id.'/'.$item->pro_slug)}}.html">Xem chi tiết</a></p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-12">
			<ul class="pagination pagination-lg">
				
			</ul>
		</div>
	</div>
