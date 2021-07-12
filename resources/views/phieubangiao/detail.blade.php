@extends('master')
@section('title')
Chi tiết phiếu bàn giao
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('phieubangiao') }}
@endsection
@section('content')
<div class="clearfix" id="TTTK">
	<div class="col-12">
		<div class="card">
			<div class="header">
				<h2>Chi tiết phiếu bàn giao</h2>
				<span class="label label-danger">Chờ xác nhận</span>
			</div>
			<div class="body">
				<div class="row clearfix">
					<div class="col-md-6 demo-masked-input">
						<label for="">Mã phiếu bàn giao</label>
						<div class="input-group">
							<div class="form-line">
								<p>MPBG04</p>
							</div>
						</div>
					</div>

					<div class="col-md-6 demo-masked-input">
						<label for="">Mã phiếu đề nghị</label>
						<div class="input-group">
							<div class="form-line">
								<p><a href="#">MPBG04</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-6 demo-masked-input">
						<label for="">Người lập phiếu bàn giao</label>
						<div class="input-group">
							<div class="form-line">
								<p>Nguyễn Văn A <br><em>(Nhân viên Phòng CSVC)</em></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 demo-masked-input">
						<label for="">Người lập phiếu đề nghị</label>
						<div class="input-group">
							<div class="form-line">
								<p>Nguyễn Văn B <br><em>(Nhân viên QLVT Khoa Điện)</em></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Hover Rows -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header row">
						<h2 style="margin-left: 20px;">Danh sách bàn giao</h2>
					</div>
					<div class="body table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Tên văn phòng phẩm</th>
									<th>Đơn vị tính</th>
									<th>Số lượng</th>
								</tr>
							</thead>
							<tbody id="DSTB">
								<tr id="TB04">
									<td style="vertical-align: middle;">TB04</td>
									<td style="vertical-align: middle;">Bút</td>
									<td style="vertical-align: middle;">Hộp</td>
									<td style="vertical-align: middle;">10</td>
								</tr>
								<tr id="TB03">
									<td style="vertical-align: middle;">TB03</td>
									<td style="vertical-align: middle;">Bút chì</td>
									<td style="vertical-align: middle;">Hộp</td>
									<td style="vertical-align: middle;">10</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Hover Rows -->
		<div style="text-align: right;">
			<a href="{{ route('phieubangiao.index') }}" class="btn bg-teal waves-effect" style="margin: 20px 0;">
				<i class="material-icons">keyboard_return</i>
				<span>Trở lại</span>
			</a>
			@if (Auth::user()->LoaiTK == 3)
			<a href="#" class="btn bg-green waves-effect" style="margin: 20px 0;">
				<i class="material-icons">done</i>
				<span>Xác nhận đã bàn giao</span>
			</a>
			@endif
		</div>
	</div>
</div>
@endsection