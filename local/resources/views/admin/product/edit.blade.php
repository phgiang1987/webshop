@extends('admin.layout.index')
@section('title','Sửa sản phẩm')
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
				<div class="panel-heading">Sửa sản phẩm</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
					{{csrf_field()}}
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								<div class="form-group" >
									<label>Danh mục sản phẩm</label>
									<select required name="cat_id" class="form-control">
										<option value="">Chọn danh mục</option>
										@php
											menuParent($cat,0,'',$product->cat->id);
										@endphp
				                    </select>
								</div>
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input required value="{{$product->pro_name}}" type="text" name="pro_name" class="form-control">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input required value="{{$product->pro_price}}" type="number" name="pro_price" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh cũ</label>
									<img width="50" src="{{asset('public/admin/product/'.$product->pro_img)}}">
									<input type="hidden" name="old_img" value="{{$product->pro_img}}" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh mới</label>
									<input required  type="file" name="new_img" class="form-control">
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input required value="{{$product->pro_phukien}}" type="text" name="pro_phukien" class="form-control">
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input required value="{{$product->pro_baohanh}}" type="text" name="pro_baohanh" class="form-control">
								</div>
								<div class="form-group" >
									<label>Khuyến mãi</label>
									<input required value="{{$product->pro_khuyenmai}}" type="text" name="pro_khuyenmai" class="form-control">
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input required value="{{$product->pro_tinhtrang}}" type="text" value="Máy mới 100%" name="pro_tinhtrang" class="form-control">
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select required name="pro_trangthai" class="form-control">
										<option
											@if($product->pro_trangthai == 1)
												{{'select'}}
											@endif
											value="1">Còn hàng</option>
										<option
											@if($product->pro_trangthai == 0)
												{{'select'}}
											@endif
										 	value="0">Hết hàng</option>
				                    </select>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea required name="pro_des" class="ckeditor">
										{!! $product->pro_des !!}
									</textarea>
								</div>
								<div class="form-group" >
									<label>Nội dung</label>
									<textarea required name="pro_content" class="ckeditor">
										{!! $product->pro_content !!}
									</textarea>
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio"
									@if($product->pro_noibat == 1)
										{{'checked'}}
									@endif
									name="pro_noibat"  value="1">
									Không: <input type="radio"
									@if($product->pro_noibat == 0)
										{{'checked'}}
									@endif
									name="pro_noibat" value="0">
								</div>
								<input type="submit" name="submit" value="Sửa" class="btn btn-primary">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
@stop