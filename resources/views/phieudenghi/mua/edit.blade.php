@extends('master')
@section('title')
Tạo phiếu đề nghị mua văn phòng phẩm
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('phieumua') }}
@endsection
@section('content')
<div class="row clearfix" id="TTTK">
  <div class="col-md-5">
    <div class="card">
      <div class="header">
        <h2>Thêm văn phòng phẩm</h2>
      </div>
      <div class="body">
        <form id="form_validation" method="POST" action="{{ route('phieumua.create') }}">
          @csrf
          @method('post')
          <div class="col-12">
            <label for="">Chọn văn phòng phẩm</label>
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
                <input type="number" name="SoLuong" min="1" max="100" class="form-control"
                  placeholder="Nhập số lượng muốn mua">
              </div>
              <span class="input-group-addon">Hộp</span>
            </div>
            <em>Hạn mức còn lại: 100 hộp.</em>
            <a href="" style="text-decoration: underline;">Tăng hạn mức</a> <br />
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
                  <th>Mã VPP</th>
                  <th>Tên văn phòng phẩm</th>
                  <th>Đơn vị tính</th>
                  <th>Số lượng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="DSTB">
                @foreach ($phieu->chiTietMua as $item)
                  <tr id="VPP-{{ $item->VatTu->ID }}">
                    <td style="vertical-align: middle;">{{ $item->VatTu->ID }}</td>
                    <td style="vertical-align: middle;">{{ $item->VatTu->Ten }}</td>
                    <td style="vertical-align: middle;">{{ $item->VatTu->DonViTinh }}</td>
                    <td style="vertical-align: middle;">{{ $item->SoLuong }}</td>
                    <td style="vertical-align: middle;"></td>
                    <td style="vertical-align: middle;">
                      <button class="btn btn-default waves-effect XoaTB" data-tr="VPP-{{ $item->VatTu->ID }}">
                        <i class="material-icons">delete</i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div style="text-align: right; clear: both;">
              <a href="{{ route('phieumua.index') }}" class="btn bg-red waves-effect" style="margin-left:10px">
                <i class="material-icons">delete</i>
                <span>Hủy</span>
              </a>
              <button type="submit" id="btn-guiyeucau" class="btn bg-green waves-effect" disabled>
                <i class="material-icons">send</i>
                <span>Gửi yêu cầu</span>
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

@section('link_head')
<!-- Colorpicker Css -->
<link href="{{ asset('dist/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />
<!-- Dropzone Css -->
<link href="{{ asset('dist/plugins/dropzone/dropzone.css') }}" rel="stylesheet" />
<!-- Multi Select Css -->
<link href="{{ asset('dist/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet" />
<!-- Bootstrap Spinner Css -->
<link href="{{ asset('dist/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />
<!-- Bootstrap Tagsinput Css -->
<link href="{{ asset('dist/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<!-- Bootstrap Select Css -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- noUISlider Css -->
<link href="{{ asset('dist/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />
@endsection

@section('script')
<!-- Select Plugin Js -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Bootstrap Colorpicker Js -->
<script src="{{ asset('dist/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<!-- Dropzone Plugin Js -->
<script src="{{ asset('dist/plugins/dropzone/dropzone.js') }}"></script>
<!-- Input Mask Plugin Js -->
<script src="{{ asset('dist/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
<!-- Multi Select Plugin Js -->
<script src="{{ asset('dist/plugins/multi-select/js/jquery.multi-select.js') }}"></script>
<!-- Jquery Spinner Plugin Js -->
<script src="{{ asset('dist/plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{ asset('dist/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<!-- noUISlider Plugin Js -->
<script src="{{ asset('dist/plugins/nouislider/nouislider.js') }}"></script>

<script>
  function isTB() {
    if ($("#DSTB tr").length > 0) {
        $("#btn-guiyeucau").attr("disabled", false);
    }
    else {
        $("#btn-guiyeucau").attr("disabled", true);
    }
  }

  isTB();

  $(".XoaTB").click(function () {
    $("#" + $(this).attr("data-tr")).remove();
    isTB();
  });
  function formatState(state) {
    if (!state.id) {
        return state.text;
    }
    var $state = $(
        '<span>' + state.text + '</span>'
    );
    return $state;
  }
  $('.dsvanphongpham').select2({
    placeholder: 'Lựa chọn 1 văn phòng phẩm',
    ajax: {
        url: 'https://api.github.com/search/repositories',
        dataType: 'json'
    },
    templateResult: formatState
  });
  $("#btn-guiyeucau").click(function () {
    var data=[];
    $('#DSTB tr').each(function () {
        var idTB = $(this).find("td").eq(0).html();
        var soLuong = $(this).find("td").eq(3).html();
        data.push({idTB,soLuong});
    });
    console.log(data);
    alert("Kiểm tra dữ liệu lấy đc ở F12 > Console")
    // Gửi data bằng ajax 
  });
</script>
@endsection