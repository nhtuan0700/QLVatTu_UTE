@extends('master')

@section('content')

<div class="row clearfix" id="TTTK">
  <div class="col-md-5">
    <div class="card">
      <div class="header">
        <h2>Thêm vật tư</h2>
      </div>
      <div class="body">
        <form id="form_validation" method="POST">
          <div class="col-12">
            <label for="">Chọn vật tư</label>
            <div class="form-group">
              <div class="form-line">
                <select class="form-control dsvanphongpham" title="Chọn 1 văn phòng phẩm" data-live-search="true"
                  name="MaVPP" required>
                </select>
              </div>
            </div>
          </div>
          <div class="col-12">
            <label for="">Số lượng</label>
            <div class="input-group">
              <div class="form-line">
                <input type="number" name="SoLuong" min="1" max="7" class="form-control"
                  placeholder="Nhập số lượng muốn mua">
              </div>
              <span class="input-group-addon">/10 Hộp</span>
            </div>
            <em>- Đã bàn giao: 3 hộp.</em>
            <br>
            <em>- Số lượng bàn giao còn lại: 7 hộp.</em>
          </div><br><br>
          <div style="text-align: right; clear: both;">
            <button type="button" id="btn-reset" class="btn bg-red waves-effect" style="margin-left:10px">
              <i class="material-icons">restart_alt</i>
              <span>Reset</span>
            </button>
            <button type="submit" id="btn-them" class="btn bg-blue waves-effect">
              <i class="material-icons">add</i>
              <span>Thêm</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-7">
    <!-- Hover Rows -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header row">
            <h2 style="margin-left: 20px;">Danh sách đã chọn</h2>
          </div>
          <div class="body table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên văn phòng phẩm</th>
                  <th>Đơn vị tính</th>
                  <th>Số lượng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="DSTB">
                <tr id="TB04">
                  <td style="vertical-align: middle;">TB04</td>
                  <td style="vertical-align: middle;">Bút</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <button class="btn btn-default waves-effect XoaTB" data-tr="TB04">
                      <i class="material-icons">delete</i>
                    </button>
                  </td>
                </tr>
                <tr id="TB03">
                  <td style="vertical-align: middle;">TB03</td>
                  <td style="vertical-align: middle;">Thước</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <button class="btn btn-default waves-effect XoaTB" data-tr="TB03">
                      <i class="material-icons">delete</i>
                    </button>
                  </td>
                </tr>
                <tr id="TB02">
                  <td style="vertical-align: middle;">TB02</td>
                  <td style="vertical-align: middle;">Bút chì</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <button class="btn btn-default waves-effect XoaTB" data-tr="TB02">
                      <i class="material-icons">delete</i>
                    </button>
                  </td>
                </tr>
                <tr id="TB01">
                  <td style="vertical-align: middle;">TB01</td>
                  <td style="vertical-align: middle;">Tẩy</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <button class="btn btn-default waves-effect XoaTB" data-tr="TB01">
                      <i class="material-icons">delete</i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div style="text-align: right; clear: both;">
              <a href="phieubangiao.html" class="btn bg-red waves-effect" style="margin-left:10px">
                <i class="material-icons">delete</i>
                <span>Hủy</span>
              </a>
              <button type="submit" id="btn-guiyeucau" class="btn bg-green waves-effect" disabled>
                <i class="material-icons">add</i>
                <span>Tạo phiếu</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Hover Rows -->
  </div>
</div>
@endsection