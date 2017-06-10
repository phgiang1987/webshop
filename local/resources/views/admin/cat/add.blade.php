@extends('admin.layout.index')
@section('title','Thêm danh mục')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Thêm danh mục</h1>
			@include('errors.notes')
			@include('errors.functions')
			<hr>
			<form enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<div class="form-group">
	                    <label>Parent</label>
	                    <select class="form-control" name="parent">
	                        <option value="0">Chọn danh mục cha</option>
	                       	@php
	                       		menuParent($cat,0,'',old('parent')); 
	                       	@endphp
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label>Name</label>
	                    <input required class="form-control" name="cat_name" value="" />
	                </div>
				</div>
				<input type="submit" name="submit" value="Thêm Danh Mục" class="btn btn-primary">
				<input type="reset" name="reset" value="Làm Mới" class="btn btn-primary">
			</form>
		</div>	
	</div>
@stop
