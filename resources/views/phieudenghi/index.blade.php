@extends('master')
@section('title')
Danh sách phiếu đề nghị
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('xetduyet') }}
@endsection

@section('content')
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header row">
        <div class="btn-group" style="margin-left: 20px;">
          <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" style="padding: 9.5px 15px;"
            aria-haspopup="true" aria-expanded="true">
            Tất cả <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Tất cả</a></li>

            <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Đề nghị mua</a></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Đề nghị sửa</a></li>

            <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Chờ duyệt</a></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Chờ bàn giao</a></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Hoàn thành</a></li>
          </ul>
        </div>
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
              <th>#</th>
              <th>Ngày lập phiếu</th>
              <th>Tổng tiền</th>
              <th>Loại phiếu</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" style="vertical-align: middle;">MP04</th>
              <td style="vertical-align: middle;">20/10/2021</td>
              <td style="vertical-align: middle;">1,200,000 vnđ</td>
              <td style="vertical-align: middle;">Phiếu mua</td>
              <td style="vertical-align: middle;">
                <span class="label label-primary">Chờ duyệt</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="xemchitiet1.html" class="btn btn-default waves-effect">
                  <i class="material-icons">visibility</i>
                </a>
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
            <tr>
              <th scope="row" style="vertical-align: middle;">MP03</th>
              <td style="vertical-align: middle;">20/10/2021</td>
              <td style="vertical-align: middle;">1,200,000 vnđ</td>
              <td style="vertical-align: middle;">Phiếu mua</td>
              <td style="vertical-align: middle;">
                <span class="label label-danger">Cần sửa đổi</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                  <i class="material-icons">visibility</i>
                </a>
              </td>
            </tr>
            <tr>
              <th scope="row" style="vertical-align: middle;">MP02</th>
              <td style="vertical-align: middle;">20/10/2021</td>
              <td style="vertical-align: middle;">1,200,000 vnđ</td>
              <td style="vertical-align: middle;">Phiếu mua</td>
              <td style="vertical-align: middle;">
                <span class="label label-warning">Chờ bàn giao (2/10)</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="{{ route('xetduyet.detail', ['id'=>1]) }}" class="btn btn-default waves-effect">
                  <i class="material-icons">visibility</i>
                </a>
              </td>
            </tr>
            <tr>
              <th scope="row" style="vertical-align: middle;">MP01</th>
              <td style="vertical-align: middle;">20/10/2021</td>
              <td style="vertical-align: middle;">1,200,000 vnđ</td>
              <td style="vertical-align: middle;">Phiếu mua</td>
              <td style="vertical-align: middle;">
                <span class="label label-success">Hoàn thành</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="xemchitietHT.html" class="btn btn-default waves-effect">
                  <i class="material-icons">visibility</i>
                </a>
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