@extends('master')
@section('title')
Quản lý vật tư
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('vattu') }}
@endsection
@section('content')
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header row">
        @if (Auth::user()->LoaiTK == 2)
        <a href="#" class="btn bg-orange waves-effect" style="float: left; margin-left: 10px;">
          <i class="material-icons">add</i>
          <span>Thêm vật tư</span>
        </a>
        @else
        <a href="#" class="btn bg-orange waves-effect" style="float: left; margin-left: 10px;">
          <i class="material-icons">add</i>
          <span>Đề xuất vật tư</span>
        </a>
        @endif
        <div class="btn-group" style="margin-left: 20px;">
          <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" style="padding: 9.5px 15px;"
            aria-haspopup="true" aria-expanded="true">
            Tất cả <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Tất cả</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Văn phòng phẩm</a></li>
            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Thiết bị văn phòng</a></li>
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
              <th>Tên vật tư</th>
              <th>Đơn vị tính</th>
              <th>Phòng ban</th>
              <th>Loại vật tư</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row" style="vertical-align: middle;">1</th>
              <td style="vertical-align: middle;">Bút bi</td>
              <td style="vertical-align: middle;">Cây</td>
              <td style="vertical-align: middle;">
                ...
              </td>
              <td style="vertical-align: middle;">
                <span class="label label-primary">Văn phòng phẩm</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="chitietbangiao1.html" class="btn btn-default waves-effect">
                  <i class="material-icons">edit</i>
                </a>
              </td>
            </tr>
            <tr>
              <th scope="row" style="vertical-align: middle;">2</th>
              <td style="vertical-align: middle;">Màn hình</td>
              <td style="vertical-align: middle;">Chiếc</td>
              <td style="vertical-align: middle;">
                Phòng CTSV
              </td>
              <td style="vertical-align: middle;">
                <span class="label label-warning">Thiết bị văn phòng</span>
              </td>
              <td style="vertical-align: middle;">
                <a href="chitietbangiao1.html" class="btn btn-default waves-effect">
                  <i class="material-icons">edit</i>
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