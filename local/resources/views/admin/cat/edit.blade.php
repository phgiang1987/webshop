@extends('admin.layout.index')
@section('title','Sửa danh mục')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Sửa danh mục</h1>
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
	                        	menuParent($parent,0,'',$cat->parent_id);
	                        @endphp
	                    </select>
	                </div>
	                <div class="form-group">
	                    <label>Name</label>
	                    <input required class="form-control" name="cat_name" value="{{$cat->cat_name}}" />
	                </div>
				</div>
				<input type="submit" name="submit" value="Sửa Danh Mục" class="btn btn-primary">
			</form>
		</div>	
	</div>
@stop