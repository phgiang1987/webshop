@extends('welcome')
@section('title','Danh mục')
@section('content')
	<div class="row list-product">
		<div class="col-md-12">
			<div class="clearfix"></div>
			<h3>{!! $cat->cat_name !!}</h3>
			@foreach($listProduct as $list)
				<div class="col-xs-6 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-sm-6 col-md-3 text-center post">
					<a href=""><img width="100%" height="300px" src="{{asset('public/admin/product/'.$list->pro_img)}}"></a>
					<p><a href="">{{$list->pro_name}}</a></p>
					<span>{{number_format($list->pro_price,0,',','.')}}VND</span>
					<div class="hover col-xs-12 col-sm-12 col-md-12">
						<p><a href="{{asset('chi-tiet/'.$list->id.'/'.$list->pro_slug)}}.html">Xem chi tiết</a></p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="row text-right">
		<div class="col-md-12">
			<ul class="pagination pagination-lg">
				{{$listProduct->links()}}
			</ul>
		</div>
	</div>
@stop