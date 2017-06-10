@extends('admin.layout.index')
@section('title','Danh sách sản phẩm')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Sản phẩm</h1>
		</div>
	</div><!--/.row-->
		
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			@include('errors.notes')
			@include('errors.functions')
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách sản phẩm</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Thêm sản phẩm</a>
							<table class="table table-bordered" style="margin-top:20px;">				
								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Tên Sản phẩm</th>
										<th>Giá sản phẩm</th>
										<th>Ảnh sản phẩm</th>
										<th>Danh mục</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
								@foreach($product as $val)
									<tr>
										<td>{{$val->id}}</td>
										<td>{{$val->pro_name}}</td>
										<td>{{number_format($val->pro_price,0,',','.')}} VND</td>
										<td>
											<img width="80" src="{{asset('public/admin/product/'.$val->pro_img)}}" class="thumbnail">
										</td>
										<td>
											@if(!empty($val->cat->cat_name))
												{{$val->cat->cat_name}}
											@else
												{{'None'}}
											@endif
										</td>
										<td class="text-center">
											<a href="{{asset('admin/product/edit/'.$val->id)}}" class="btn btn-warning"><i class="fa fa-pencil" 
											aria-hidden="true"></i> Sửa</a>
											<a onclick="return confirm('Bạn có muốn xóa không ?');" href="{{asset('admin/product/del/'.$val->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>							
						</div>
					</div>
					<div class="pagination pull-right">
						{{$product->links()}}
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
@stop