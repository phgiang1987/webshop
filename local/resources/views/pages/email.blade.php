
<div id="wrap-inner">
	<div class="row list-product">
		<div class="col-md-12">
			<h3>Thông tin khách hàng</h3>
			<p>
				<span class="info">Khách hàng: {{$info['name']}}</span>
			</p>
			<p>
				<span class="info">Email: {{$info['email']}}</span>
				
			</p>
			<p>
				<span class="info">Điện thoại: {{$info['phone']}}</span>
				
			</p>
			<p>
				<span class="info">Địa chỉ: {{$info['add']}}</span>
			</p>
			<p>
				<span class="info">Tổng tiền bao gồm thuế: {{$info['total']}}</span>
			</p>
		</div>
		<div class="col-md-12">
			<h3>Hóa đơn mua hàng</h3>
			<table width="600" border="1" cellpadding="5" cellspacing="0">
				<tr style="background: #333; color: #FFF;font-weight: bold;">
					<td>Tên sản phẩm</td>
					<td>Giá</td>
					<td>Số lượng</td>
					<td>Thành tiền</td>
				</tr>
				@foreach($content as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{number_format($item->price,0,',','.')}} VNĐ</td>
						<td>{{$item->qty}}</td>
						<td>{{number_format($item->qty*$item->price,0,',','.')}} VNĐ</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>			
</div>
