@extends('master')
@section('title')
Chi tiết phiếu đề nghị mua
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('phieumua') }}
@endsection
@section('content')
<div class="clearfix" id="TTTK">
  <div class="col-12">
    <div class="card">
      <div class="header">
        <h2>Chi tiết phiếu đề nghị</h2>
        <span class="label label-danger">Đang bàn giao (2/10)</span>
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
            <label for="">Người xét duyệt</label>
            <div class="input-group">
              <div class="form-line">
                <p>Nguyễn Văn b</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 demo-masked-input">
            <label for="">Ngày lập phiếu</label>
            <div class="input-group">
              <div class="form-line">
                <p>20/07/2021</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row clearfix">
          <div class="col-md-6 demo-masked-input">
            <label for="">Ngày dự kiến hoàn thành</label>
            <div class="input-group">
              <div class="form-line">
                <p>30/11/2021</p>
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
                  <th>Tình trạng</th>
                </tr>
              </thead>
              <tbody id="DSTB">
                <tr id="TB04">
                  <td style="vertical-align: middle;">TB04</td>
                  <td style="vertical-align: middle;">Bút</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <span class="label label-success">Hoàn tất</span>
                  </td>
                </tr>
                <tr id="TB03">
                  <td style="vertical-align: middle;">TB03</td>
                  <td style="vertical-align: middle;">Bút chì</td>
                  <td style="vertical-align: middle;">Hộp</td>
                  <td style="vertical-align: middle;">10</td>
                  <td style="vertical-align: middle;">
                    <span class="label label-primary">Đang bàn giao (2/10)</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Hover Rows -->
    <div style="text-align: right;">

      @if (Auth::user()->LoaiTK == 2)
      <a href="#" class="btn bg-teal waves-effect" style="margin: 20px 0;">
        <i class="material-icons">keyboard_return</i>
        <span>Trở lại</span>
      </a>
      <a href="#" class="btn bg-orange waves-effect" style="margin: 20px 0;">
        <i class="material-icons">add</i>
        <span>Tạo phiếu bàn giao</span>
      </a>
      @else
      <a href="#" class="btn bg-teal waves-effect" style="margin: 20px 0;">
        <i class="material-icons">keyboard_return</i>
        <span>Trở lại</span>
      </a>
      <a href="#" class="btn bg-green waves-effect" style="margin: 20px 0;">
        <i class="material-icons">done</i>
        <span>Hoàn thành</span>
      </a>
      @endif
    </div>
  </div>
</div>
@endsection