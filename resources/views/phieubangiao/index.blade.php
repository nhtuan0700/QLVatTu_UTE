@extends('master')
@section('title')
Tạo phiếu bàn giao
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('phieubangiao') }}
@endsection
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header row">
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
							<th>Mã phiếu bàn giao</th>
							<th>Mã phiếu đề nghị</th>
							<th>Tên người lập phiếu</th>
							<th>Tên người xác nhận</th>
							<th>Ngày bàn giao</th>
							<th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row" style="vertical-align: middle;">MPBD04</th>
							<td style="vertical-align: middle;">MP01</td>
							<td style="vertical-align: middle;">Trần Bửu Dung</td>
							<td style="vertical-align: middle;">Hoàng Thị Mỹ Lệ</td>
							<td style="vertical-align: middle; text-align: center;">
								<abbr>...</abbr>
							</td>
							<td style="vertical-align: middle;">
								<span class="label label-warning">Chờ xác nhận</span>
							</td>
							<td style="vertical-align: middle;">
								<a href="{{ route('phieubangiao.detail', ['id'=>1]) }}" class="btn btn-default waves-effect">
									<i class="material-icons">visibility</i>
								</a>
							</td>
						</tr>
						<tr>
							<th scope="row" style="vertical-align: middle;">MPBD04</th>
							<td style="vertical-align: middle;">MP01</td>
							<td style="vertical-align: middle;">Trần Bửu Dung</td>
							<td style="vertical-align: middle;">Hoàng Thị Mỹ Lệ</td>
							<td style="vertical-align: middle;">
								<abbr>20/11/2012</abbr>
							</td>
							<td style="vertical-align: middle;">
								<span class="label label-success">Hoàn thành</span>
							</td>
							<td style="vertical-align: middle;">
								<a href="{{ route('phieubangiao.detail', ['id'=>1]) }}" class="btn btn-default waves-effect">
									<i class="material-icons">visibility</i>
								</a>
								<button class="btn btn-default waves-effect" data-toggle="modal" data-target="#PhieuDeNghi4">
									<i class="material-icons">delete</i>
								</button>
								<div class="modal fade in" id="PhieuDeNghi4" tabindex="-1" role="dialog" style="display: none;">
									<div class="modal-dialog modal-sm" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Bạn có chắc chắn muốn xóa?</h4>
											</div>
											<div class="modal-body">
												Mọi thông tin về phiếu đề nghị 4 sẽ biến mất hoàn toàn.
											</div>
											<div class="modal-footer">
												<a href="#" class="btn btn-link waves-effect">Tiếp tục xóa</a>
												<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hủy</button>
											</div>
										</div>
									</div>
								</div>
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