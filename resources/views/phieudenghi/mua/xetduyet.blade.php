@extends('master')
@section('title')
Chi tiết phiếu đề nghị mua
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('phieumua') }}
@endsection
@section('content')
<!-- Main -->
<div class="clearfix" id="TTTK">
  <div class="col-12">
    <div class="card">
      <div class="header">
        <h2>Chi tiết phiếu đề nghị</h2>
        @switch($phieu->TrangThai)
          @case(1)
            @if ($phieu->GhiChu)
              <span class="label label-danger">{{ $phieu->trangThai() }}</span>
            @else
              <span class="label label-primary">{{ $phieu->trangThai() }}</span>
            @endif
            @break
          @case(2)
            <span class="label label-warning">{{ $phieu->trangThai() }}</span>
            @break
          @default
            <span class="label label-success">{{ $phieu->trangThai() }}</span>
        @endswitch
      </div>
      <div class="body">
            <div class="row clearfix">
                <div class="col-md-6 demo-masked-input">
                    <label for="">Mã phiếu</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->ID }}</p>
                            <input type="hidden" id="ID_PhieuDN" value="{{$phieu->ID}}" >
                            <input type="hidden" id="ID_NVCSVC" value="{{$phieu->NguoiDeNghi->ID}}" >
                        </div>
                    </div>
                </div>

                <div class="col-md-6 demo-masked-input">
                    <label for="">Loại phiếu</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->loaiPhieu() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 demo-masked-input">
                    <label for="">Người yêu cầu</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->nguoiDeNghi->HoTen }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 demo-masked-input">
                    <label for="">Chức vụ</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->nguoiDeNghi->vaiTro() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 demo-masked-input">
                    <label for="">Ngày yêu cầu</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->NgayLapPhieu }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 demo-masked-input">
                    <label for="">Đơn vị</label>
                    <div class="input-group">
                        <div class="form-line">
                            <p>{{ $phieu->nguoiDeNghi->khoaPB->Ten }}</p>
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
            <h2 style="margin-left: 20px;">Danh sách văn phòng phẩm yêu cầu</h2>
          </div>
          <div class="body table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Mã VPP</th>
                  <th>Tên văn phòng phẩm</th>
                  <th>Đơn vị tính</th>
                  <th>Giá</th>
                  <th>Đã bàn giao / Tổng số lượng</th>
                    <th>Bàn giao thêm</th>
                </tr>
              </thead>
              <tbody id="DSTB">
                @foreach ($phieu->chiTietMua as $item)
                  <tr id="{{ $item->VatTu->ID }}">
                    <td style="vertical-align: middle;">{{ $item->VatTu->ID }}</td>
                    <td style="vertical-align: middle;">{{ $item->VatTu->Ten }}</td>
                    <td style="vertical-align: middle;">{{ $item->VatTu->DonViTinh }}</td>
                      <td style="vertical-align: middle;">{{ $item->Gia }}</td>
                    <td style="vertical-align: middle;">{{ $item->soLuongDaBG() }}/{{ $item->SoLuong }}</td>
                    <td style="vertical-align: middle;">
                        <div class="form-group" style="margin-bottom: 0">
                            <div class="form-line">
                                <input type="number" name="SL_VatTu[]" class="form-control" min="0" max="{{$item->SoLuong - $item->soLuongDaBG() }}">
                            </div>
                        </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Hover Rows -->
    {{-- Kiểm tra nếu phiếu có ghi chú --}}
    @if (!!$phieu->GhiChu)
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header row">
              <h2 style="margin-left: 20px;">Phản hồi đến người đề nghị</h2>
            </div>
            <div class="body table-responsive">
              <div class="form-line">
                <textarea rows="4" id="NoiDungGhiChu" class="form-control no-resize"
                  placeholder="Nội dung cần phản hồi cho người đề nghị..." readonly>{{ $phieu->GhiChu }}</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div style="text-align: right;">
      <a href="{{ route('xetduyet.index') }}" class="btn bg-teal waves-effect" style="margin: 20px 0;">
        <i class="material-icons">keyboard_return</i>
        <span>Trở lại</span>
      </a>
      {{-- Kiểm tra nếu phiếu có ghi chú và chưa duyệt --}}
      @if (!$phieu->GhiChu && $phieu->TrangThai == 1)
        <a href="#" class="btn bg-orange waves-effect" style="margin: 20px 0;" data-toggle="modal"
          data-target="#PhanHoiModel">
          <i class="material-icons">feedback</i>
          <span>Phản hồi</span>
        </a>
        <div class="modal fade in" id="PhanHoiModel" tabindex="-1" role="dialog" style="display: none;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" style="text-align: left;">Nội dung phản hồi</h4>
              </div>
              <div class="modal-body">
                <div class="form-line">
                  <textarea rows="4" id="NoiDungGhiChu" class="form-control no-resize"
                    placeholder="Nội dung cần phản hồi cho người đề nghị..."></textarea>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" id="btn-phanhoi" class="btn btn-link waves-effect">Gửi</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hủy</button>
              </div>
            </div>
          </div>
        </div>
      @endif

      {{-- Kiểm tra nếu phiếu chưa duyệt --}}
      @switch($phieu->TrangThai)
        @case(1)
          <a data-toggle="modal" data-target="#PheDuyet" class="btn bg-green waves-effect" style="margin: 20px 0;">
            <i class="material-icons">done</i>
            <span>Phê duyệt</span>
          </a>
          <div class="modal fade in" id="PheDuyet" tabindex="-1" role="dialog" style="display: none;text-align: left;">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Phê duyệt phiếu đề nghị</h4>
                </div>
                <div class="modal-body">
                  <div class="col-12 demo-masked-input">
                    <label for="">Điền ngày dự kiến hoàn thành</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">date_range</i>
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control date" name="NgayDuKien" placeholder="Ex: 30/07/2016"
                          required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <a id="btn-pheduyet" class="btn btn-link waves-effect">Phê duyệt</a>
                  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hủy</button>
                </div>
              </div>
            </div>
          </div>
          @break
        @case(2)
          <a id="btn-guiyeucau" class="btn bg-orange waves-effect" style="margin: 20px 0;">
            <i class="material-icons">add</i>
            <span>Tạo phiếu bàn giao</span>
          </a>
          @break
        @default
          <button onclick="window.print();" class="btn bg-green waves-effect" style="margin: 20px 0;">
            <i class="material-icons">print</i>
            <span>In</span>
          </button>
      @endswitch
    </div>
  </div>
</div>
<!-- #END# Main -->
@endsection

@section('script')
<script>
  $("#btn-phanhoi").click(function () {
      swal({
          title: "Hoàn thành",
          text: "Bạn vừa gửi phản hồi thành công",
          type: "success",
          confirmButtonColor: "rgb(140, 212, 245)",
          confirmButtonText: "Ok",
          closeOnConfirm: false
      }, function () {
          location.href = "phieudenghi.html";
      });
  })
  $("#btn-pheduyet").click(function () {
      swal({
          title: "Hoàn thành",
          text: "Phê duyệt phiếu đề nghị thành công",
          type: "success",
          confirmButtonColor: "rgb(140, 212, 245)",
          confirmButtonText: "Ok",
          closeOnConfirm: false
      }, function () {
          location.href = "phieudenghi.html";
      });
  })
  $("#btn-guiyeucau").click(function() {
      var ID_PhieuDN = document.getElementById("ID_PhieuDN").value;
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
          url: "{{route('phieubangiao.createBanGiao')}}",
          dataType: 'json',
          type: 'POST',
          data: {
              data: dt,
              ID_PhieuDN: ID_PhieuDN,
              _token: '{!! csrf_token() !!}',
          },
          success: function(response) {
              if (response) {
                  swal({
                      title: "Hoàn thành",
                      text: "Tạo mới phiếu bàn giao thành công",
                      type: "success",
                      confirmButtonColor: "rgb(140, 212, 245)",
                      confirmButtonText: "Ok",
                      closeOnConfirm: false
                  }, function() {
                      location.href = "{{route('phieubangiao.index')}}";
                  });
              }
              else{
                  swal({
                      title: "Lỗi",
                      text: "Lỗi khi tạo mới phiếu bàn giao",
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
