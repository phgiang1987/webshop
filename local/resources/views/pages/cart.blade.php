@extends('welcome')
@section('title','Giỏ Hàng')
@section('content')
<script type="text/javascript">
	$(function(){
		$('.updateCart').on('keyup change',function(){
			rowId = $(this).attr('rowId');
			qty = $(this).val();
			$.get('cartUpdate',{rowId:rowId,qty:qty},function(data){
				data = JSON.parse(data);
				$('#'+rowId).html(data.totalPrice);
				$('.total-price').html(data.totalAll);
			});
		});
	});
</script>
	<div class="row list-product">
		<div class="col-md-12">
		@include('errors.notes')
			<div class="clearfix"></div>
			<h3>Giỏ hàng</h3>
			<form>
				<table class="table table-bordered .table-responsive text-center">
					<tr class="active">
						<td width="11.111%">Ảnh mô tả</td>
						<td width="22.222%">Tên sản phẩm</td>
						<td width="22.222%">Số lượng</td>
						<td width="16.6665%">Đơn giá</td>
						<td width="16.6665%">Thành tiền</td>
						<td width="11.112%">Xóa</td>
					</tr>
					@foreach($list as $item)
					<tr>
						<td><img class="img-responsive" src="{{asset('public/admin/product/'.$item->options->img)}}"></td>
						<td>{{$item->name}}</td>
						<td>
							<div class="form-group">
								<input class="form-control updateCart" rowId="{{$item->rowId}}" type="number" min="1" value="{{$item->qty}}">
							</div>
						</td>
						<td><span class="price">{{$item->price}} VND</span></td>
						<td><span id="{{$item->rowId}}" class="price">{{$item->price*$item->qty}} VND</span></td>
						<td><a onclick="return confirm('Bạn có muốn xóa sản phẩm này ?');" href="{{asset('xoa-hang/'.$item->rowId)}}"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
					@endforeach
				</table>
				<div class="row" id="total-price">
					<div class="col-md-12">
						Tổng thanh toán: <span class="total-price">{{$totalAll}} VND</span>
						<a class="btn btn-warning" href="{{asset('/')}}">Mua tiếp</a>
						<a onclick="return confirm('Bạn có muốn xóa toàn bộ giỏ hàng này ?');" class="btn btn-warning" href="{{asset('xoa-hang/0')}}">Xóa Giỏ Hàng</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	@if(Cart::count() > 0)
		<div class="row list-product">
			<div class="col-md-9">
				<h3>Xác nhận mua hàng</h3>
					<form method="POST">
					{{csrf_field()}}
						<div class="form-group">
							<label for="total">Tổng thanh toán:</label>
							<input required type="text" name="total" class="form-control total-price" value="{{$totalAll}} VND">
						</div>
						<div class="form-group">
							<label for="email">Email address:</label>
							<input required type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label for="name">Họ và tên:</label>
							<input required type="text" class="form-control" name="name">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại:</label>
							<input required type="number" class="form-control" name="phone">
						</div>
						<div class="form-group">
							<label for="add">Địa chỉ:</label>
							<input required type="text" class="form-control" name="add">
						</div>
						<div class="form-group text-right">
							<button type="submit" name="submit" class="btn btn-danger">Thực hiện đơn hàng</button>
						</div>
					</form>
			</div>
		</div>
	@endif
@stop