@extends('admin.layout.index')
@section('title','Danh sách danh mục')
@section('content')
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			@include('errors.notes')
			<div class="panel panel-primary">
				<div class="panel-heading">Danh sách danh mục</div>
				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							<a href="{{asset('admin/cat/add')}}" class="btn btn-primary">Thêm danh mục</a>
							<table class="table table-bordered" style="margin-top:20px;">
								<thead>
									<tr class="bg-primary">
										<th>Tên danh mục</th>
										<th>Slug</th>
										<th>Parent</th>
										<th>Tùy chọn</th>
									</tr>
								</thead>
								<tbody>
								@foreach($cat as $val)
									<tr>
										<td>{{$val->cat_name}}</td>
										<td>{{$val->cat_slug}}</td>
										<td>
											@if($val->parent_id == 0)
												{{'None'}}
											@elseif($child = DB::table('cats')->where('id',$val->parent_id)->first())
												{{$child->cat_name}}
											@endif
										</td>
										<td align="center">
											<a href="{{asset('admin/cat/edit/'.$val->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a onclick="return confirm('Bạn có muốn xóa không ?');" href="{{asset('admin/cat/del/'.$val->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>							
						</div>
					</div>
				</div>
			</div>
			<div class="pagination pull-right">
				{{$cat->links()}}
			</div>
		</div>
	</div>
@stop