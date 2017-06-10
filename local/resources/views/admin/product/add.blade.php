@extends('admin.layout.index')
@section('title','Thêm sản phẩm')
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
				<div class="panel-heading">Thêm sản phẩm</div>
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
											menuParent($cat,0,'',old('cat_id'));
										@endphp
				                    </select>
								</div>
								<div class="form-group" >
									<label>Tên sản phẩm</label>
									<input required type="text" name="pro_name" class="form-control">
								</div>
								<div class="form-group" >
									<label>Giá sản phẩm</label>
									<input required value="10000000" type="number" name="pro_price" class="form-control">
								</div>
								<div class="form-group" >
									<label>Ảnh sản phẩm</label>
									<input required id="img" type="file" name="pro_img" class="form-control">
								</div>
								<div class="form-group" >
									<label>Phụ kiện</label>
									<input required value="Full phụ kiện ..." type="text" name="pro_phukien" class="form-control">
								</div>
								<div class="form-group" >
									<label>Bảo hành</label>
									<input required value="12 tháng" type="text" name="pro_baohanh" class="form-control">
								</div>
								<div class="form-group" >
									<label>Khuyến mãi</label>
									<input required value="ốp, dán kính cường lực ..." type="text" name="pro_khuyenmai" class="form-control">
								</div>
								<div class="form-group" >
									<label>Tình trạng</label>
									<input required type="text" value="Máy mới 100%" name="pro_tinhtrang" class="form-control">
								</div>
								<div class="form-group" >
									<label>Trạng thái</label>
									<select required name="pro_trangthai" class="form-control">
										<option value="1">Còn hàng</option>
										<option value="0">Hết hàng</option>
				                    </select>
								</div>
								<div class="form-group" >
									<label>Miêu tả</label>
									<textarea required name="pro_des" class="ckeditor">
										<span>Các sản phẩm đều là hàng chất lượng cao ... </span>
									</textarea>
								</div>
								<div class="form-group" >
									<label>Nội dung</label>
									<textarea required name="pro_content" class="ckeditor">
										<span>Chào mừng các bạn đã đến với website bán hàng điện thoại của chúng tôi. Chúng tôi cam kết cung cấp sản phẩm tốt nhất cho các bạn. Nếu bị hỏng các bạn sẽ phải dùng sản phẩm đó ...</span>
									</textarea>
								</div>
								<div class="form-group" >
									<label>Sản phẩm nổi bật</label><br>
									Có: <input type="radio" name="pro_noibat" checked value="1">
									Không: <input type="radio" name="pro_noibat" value="0">
								</div>
								<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
								<a href="#" class="btn btn-danger">Hủy bỏ</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
@stop