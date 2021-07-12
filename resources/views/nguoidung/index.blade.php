@extends('master')
@section('title')
Tài khoản người dùng
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('nguoidung') }}
@endsection
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header row">
				<button type="button" class="btn bg-orange waves-effect" style="float: left; margin-left: 10px;">
					<i class="material-icons">person_add</i>
					<span>Tạo mới</span>
				</button>
				<div class="col-md-4" style="float:right;">
					<div class="input-group" style="margin-bottom: 0 !important;">
						<div class="form-line">
							<input type="text" class="form-control" placeholder="Tìm kiếm">
						</div>
						<span class="input-group-addon">
							<i class="material-icons">search</i>
						</span>
					</div>
				</div>
			</div>
			<div class="body table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã Người Dùng</th>
							<th>Họ tên</th>
							<th>Email</th>
							<th>Khoa/Phòng ban</th>
							<th>Loại tài khoản</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row" style="vertical-align: middle;">1</th>
							<td style="vertical-align: middle;">Trần Bửu Dung</td>
							<td style="vertical-align: middle;">@buudung</td>
							<td style="vertical-align: middle;">Khoa Điện - Điện Tử</td>
							<td style="vertical-align: middle;">Giảng viên/Cán bộ</td>
							<td style="vertical-align: middle;">
								<button type="button" class="btn btn-default waves-effect">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" class="btn btn-default waves-effect">
									<i class="material-icons">delete</i>
								</button>
							</td>
						</tr>
					</tbody>
				</table>
				<nav style="text-align: right;">
					<ul class="pagination">
						<li class="disabled">
							<a href="javascript:void(0);">
								<i class="material-icons">chevron_left</i>
							</a>
						</li>
						<li class="active"><a href="javascript:void(0);">1</a></li>
						<li><a href="javascript:void(0);" class="waves-effect">2</a></li>
						<li><a href="javascript:void(0);" class="waves-effect">3</a></li>
						<li><a href="javascript:void(0);" class="waves-effect">4</a></li>
						<li><a href="javascript:void(0);" class="waves-effect">5</a></li>
						<li>
							<a href="javascript:void(0);" class="waves-effect">
								<i class="material-icons">chevron_right</i>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection