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
        <span class="label label-primary">Chờ duyệt</span>
      </div>
      <div class="body">
        <div class="row clearfix">
          <div class="col-md-6 demo-masked-input">
            <label for="">Mã phiếu</label>
            <div class="input-group">
              <div class="form-line">
                <p>MP04</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 demo-masked-input">
            <label for="">Loại phiếu</label>
            <div class="input-group">
              <div class="form-line">
                <p>Mua</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-6 demo-masked-input">
            <label for="">Người yêu cầu</label>
            <div class="input-group">
              <div class="form-line">
                <p>Nguyễn Văn A</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 demo-masked-input">
            <label for="">Chức vụ</label>
            <div class="input-group">
              <div class="form-line">
                <p>Nhân viên quản lí vật tư</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-6 demo-masked-input">
            <label for="">Ngày yêu cầu</label>
            <div class="input-group">
              <div class="form-line">
                <p>20/07/2021</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 demo-masked-input">
            <label for="">Đơn vị</label>
            <div class="input-group">
              <div class="form-line">
                <p>Khoa Điện</p>
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
      <a href="{{ route('xetduyet.index') }}" class="btn bg-teal waves-effect" style="margin: 20px 0;">
        <i class="material-icons">keyboard_return</i>
        <span>Trở lại</span>
      </a>

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
              <button type="button" id="btn-phanhoi" class="btn btn-link waves-effect">Gửi</a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Hủy</button>
            </div>
          </div>
        </div>
      </div>

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
</script>
@endsection