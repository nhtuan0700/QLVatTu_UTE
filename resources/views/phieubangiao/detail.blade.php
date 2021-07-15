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
				@if (!$phieu->ID_NguoiXN)
					<span class="label label-warning">{{ $phieu->trangThai() }}</span>
				@else
					<span class="label label-success">{{ $phieu->trangThai() }}</span>
				@endif
			</div>
			<div class="body">
				<div class="row clearfix">
					<div class="col-md-6 demo-masked-input">
						<label for="">Mã phiếu bàn giao</label>
						<div class="input-group">
							<div class="form-line">
								<p >{{ $phieu->ID }}</p>
                                <input type="hidden" id="ID_PhieuBG" value="{{$phieu->ID}}" >
							</div>
						</div>
					</div>

					<div class="col-md-6 demo-masked-input">
						<label for="">Mã phiếu đề nghị</label>
						<div class="input-group">
							<div class="form-line">
								<p><a href="#">{{ $phieu->ID_PhieuDN }}</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-6 demo-masked-input">
						<label for="">Người lập phiếu bàn giao</label>
						<div class="input-group">
							<div class="form-line">
								<p>{{ $phieu->nguoiLapPhieu->HoTen }}<br><em>({{ $phieu->nguoiLapPhieu->vaiTro() }})</em></p>
							</div>
						</div>
					</div>

					<div class="col-md-6 demo-masked-input">
						<label for="">Người lập phiếu đề nghị</label>
						<div class="input-group">
							<div class="form-line">
								<p>{{ $phieu->phieuDeNghi->nguoiDeNghi->HoTen }}<br>
									<em>({{ $phieu->phieuDeNghi->nguoiDeNghi->vaiTro() . ' ' . $phieu->phieuDeNghi->nguoiDeNghi->khoaPB->Ten }})</em>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-6 demo-masked-input">
						<label for="">Loại phiếu</label>
						<div class="input-group">
							<div class="form-line">
								<p>{{ $phieu->phieuDeNghi->loaiPhieu() }}</p>
							</div>
						</div>
					</div>
				</div>
				@if (	$phieu->ID_NguoiXN)
					<div class="row clearfix">
						<div class="col-md-6 demo-masked-input">
								<label for="">Ngày hoàn thành</label>
								<div class="input-group">
										<div class="form-line">
												<p><abbr title="20/7/2021">{{ $phieu->NgayBanGiao }}</abbr>
														<br><em>(Xác nhận bởi {{ $phieu->nguoiXacNhan->HoTen }})</em>
												</p>
										</div>
								</div>
						</div>
					</div>
				@endif
			</div>
		</div>

		<!-- Hover Rows -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header row">
						<h2 style="margin-left: 20px;">
							Danh sách bàn giao {{ $phieu->phieuDenghi->LoaiPhieu == 1 ? 'văn phòng phẩm'  : 'thiết bị' }}
						</h2>
					</div>
					<div class="body table-responsive">
						<table class="table table-hover">
							@if ($phieu->phieuDeNghi->LoaiPhieu == 1)
								<thead>
									<tr>
										<th>Mã VPP</th>
										<th>Tên VPP</th>
										<th>Đơn vị tính</th>
										<th>Giá</th>
										<th>Đã bàn giao/ Tổng số lượng</th>
										@if (!$phieu->ID_NguoiXN)
                                            <th>Đang bàn giao</th>
                                            <th>Bàn giao thêm</th>
										@endif
									</tr>
								</thead>
								<tbody id="DSTB">
									@foreach ($phieu->phieuDeNghi->chiTietMua as $item)
										<tr id="{{ $item->VatTu->ID }}">
											<td style="vertical-align: middle;">{{ $item->VatTu->ID }}</td>
											<td style="vertical-align: middle;">{{ $item->VatTu->Ten }}</td>
											<td style="vertical-align: middle;">{{ $item->VatTu->DonViTinh }}</td>
											<td style="vertical-align: middle;">{{ $item->Gia }}</td>
											<td style="vertical-align: middle;">{{ $item->soLuongDaBG() }}/ {{$item->SoLuong}}</td>
											@if (!$phieu->ID_NguoiXN)
                                                <td>{{ $item->soLuongDangBG($phieu->ID) }}</td>
												<td style="vertical-align: middle;">
                                                    <div class="form-group" style="margin-bottom: 0">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" min="0" max="{{$item->SoLuong - $item->soLuongDaBG() }}" >
                                                        </div>
                                                    </div>
                                                </td>
											@endif
										</tr>
									@endforeach
								</tbody>
								@else
									<thead>
										<tr>
											<th>Mã thiết bị</th>
											<th>Tên thiết bị</th>
											<th>Đơn vị tính</th>
											<th>Tình trạng sửa</th>
											<th>Chi Phí sửa</th>
											<th>Đã bàn giao</th>
											<th>Đang bàn giao</th>
										</tr>
									</thead>
									<tbody id="DSTB">
									</tbody>
								@endif
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
			@if (Auth::user()->LoaiTK == 2)
				@if (!$phieu->ID_NguoiXN)
					<a id="btn-edit" class="btn bg-green waves-effect" style="margin: 20px 0;">
						<i class="material-icons">done</i>
						<span>Cập nhật</span>
					</a>
				@endif
			@else
				@if ($phieu->ID_NguoiXN)
						<button onclick="window.print()" class="btn bg-green waves-effect" style="margin: 20px 0;">
							<i class="material-icons">print</i>
							<span>In</span>
						</button>
					@else
						<a href="{{route('phieubangiao.confirm',$phieu->ID)}}" class="btn bg-green waves-effect" style="margin: 20px 0;" methods="put">
							<i class="material-icons">done</i>
							<span>Xác nhận</span>
						</a>
					@endif
			@endif
		</div>
	</div>
</div>
<script>
    $("#btn-edit").click(function() {
        var ID_PhieuBG = document.getElementById("ID_PhieuBG").value;
        var dt = [];
        $('#DSTB tr').each(function() {
            var idTB = $(this).find("td").eq(0).html();
            var soLuong = $(this).find("td").find('div').find('div').find('input').eq(0).val();
            dt.push({
                idTB,
                soLuong
            });
        });
        $.ajax({
            url: "{{route('phieubangiao.updateBanGiao')}}",
            dataType: 'json',
            type: 'POST',
            data: {
                data: dt,
                ID_PhieuBG:ID_PhieuBG,
                _token: '{!! csrf_token() !!}',
            },
            success: function(response) {
                if (response) {
                    console.log(1)
                    swal({
                        title: "Hoàn thành",
                        text: "Cập nhật phiếu bàn giao thành công",
                        type: "success",
                        confirmButtonColor: "rgb(140, 212, 245)",
                        confirmButtonText: "Ok",
                        closeOnConfirm: false
                    }, function() {
                        location.href = "{{route('phieubangiao.index')}}";
                    });
                }
                else{
                    console.log(2);
                    swal({
                        title: "Lỗi",
                        text: "Lỗi khi tạo cập nhật phiếu bàn giao",
                        type: "alert",
                        confirmButtonColor: "rgb(140, 212, 245)",
                        confirmButtonText: "Ok",
                    });
                }
            }
        });
    });
</script>
@endsection
