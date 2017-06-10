@extends('admin.layout.index')
@section('title','Danh Sách Thành Viên')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Thành Viên</h1>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">
		@include('errors.notes')
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách thành viên</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<a href="{{asset('admin/user/add')}}" class="btn btn-primary">Thêm thành viên</a>
						<table class="table table-bordered" style="margin-top:20px;">
							<thead>
								<tr class="bg-primary">
									<th>ID</th>
									<th>Tên thành viên</th>
									<th>Địa chỉ email</th>
									<th>Quyền</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								@foreach($list as $val)
									<tr>
										<td>{{$val->id}}</td>
										<td>{{$val->name}}</td>
										<td>{{$val->email}}</td>
										<td>
											@if($val->level == 1 && $val->id == 1)
												{!!'<span style="color:red">SuperAdmin</span>'!!}
											@elseif($val->level == 1)
												{{'Admin'}}
											@else
												{{'Member'}}
											@endif
										</td>
										<td>
											<a href="{{asset('admin/user/edit/'.$val->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a onclick="return confirm('Bạn có muốn xóa không ?');" href="{{asset('admin/user/del/'.$val->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>							
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
@stop