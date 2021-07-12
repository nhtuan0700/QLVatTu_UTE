@extends('master')
@section('title')
Thống kê  
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('thongke') }}
@endsection
@section('content')
<!-- Widgets -->
<div class="row clearfix">
  <div class="col-sm-12">
    <div class="block-header" style="float: left;">
      <div id="reportrange"
        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="material-icons" style="font-size: 13px;">date_range</i>&nbsp;
        <span id="DatePicker"></span> <i class="material-icons" style="font-size: 13px;">arrow_drop_down</i>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
      <div class="icon">
        <i class="material-icons">shopping_bag</i>
      </div>
      <div class="content">
        <div class="text">Mua sắm</div>
        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
      <div class="icon">
        <i class="material-icons">handyman</i>
      </div>
      <div class="content">
        <div class="text">Sửa chữa</div>
        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
      <div class="icon">
        <i class="material-icons">done</i>
      </div>
      <div class="content">
        <div class="text">Sửa hoàn tất</div>
        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
      <div class="icon">
        <i class="material-icons">dangerous</i>
      </div>
      <div class="content">
        <div class="text">Thiết bị hỏng</div>
        <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
</div>
<!-- #END# Widgets -->


<div class="row clearfix">
  <!-- Tình hình mua sắm, sửa chữa ở các khoa, phòng ban -->
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="card">
      <div class="header">
        <h2>TÌNH HÌNH MUA SẮM & SỬA CHỮA</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table table-hover dashboard-task-infos">
            <thead>
              <tr>
                <th>#</th>
                <th>Khoa</th>
                <th>Mua sắm</th>
                <th>Sửa chữa</th>
                <th>Xu hướng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Điện - Điện Tử</td>
                <td>100 phiếu</td>
                <td>90 phiếu</td>
                <td>
                  <i class="material-icons">trending_up</i>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Điện - Điện Tử</td>
                <td>10 phiếu</td>
                <td>90 phiếu</td>
                <td>
                  <i class="material-icons">trending_up</i>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Điện - Điện Tử</td>
                <td>100 phiếu</td>
                <td>90 phiếu</td>
                <td>
                  <i class="material-icons">trending_down</i>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Điện - Điện Tử</td>
                <td>100 phiếu</td>
                <td>90 phiếu</td>
                <td>
                  <i class="material-icons">trending_flat</i>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Điện - Điện Tử</td>
                <td>100 phiếu</td>
                <td>90 phiếu</td>
                <td>
                  <i class="material-icons">trending_down</i>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- #END# Tình hình mua sắm các khoa, phòng ban -->

  <!-- Tỉ lệ sửa chữa -->
  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="card">
      <div class="header">
        <h2>TỈ LỆ SỬA CHỮA THIẾT BỊ</h2>
        <ul class="header-dropdown m-r--5">
          <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
              aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">more_vert</i>
            </a>
            <ul class="dropdown-menu pull-right">
              <li><a href="javascript:void(0);">Action</a></li>
              <li><a href="javascript:void(0);">Another action</a></li>
              <li><a href="javascript:void(0);">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="body">
        <div id="donut_chart" class="dashboard-donut-chart"></div>
      </div>
    </div>
  </div>
  <!-- #END# Tỉ lệ sửa chữa -->
</div>

<div class="row clearfix">
  <!-- Mua sắm -->
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="body bg-cyan">
        <div class="font-bold m-b-35">MUA SẮM VĂN PHÒNG PHẨM</div>
        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)"
          data-highlight-Line-Color="#fff" data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
          data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-Width="2"
          data-line-Color="rgba(255,255,255,0.7)" data-fill-Color="rgba(0, 188, 212, 0)">
          1,5,90,342,4225,8752
        </div>
        <ul class="dashboard-stat-list">
          <li>
            Hôm nay
            <span class="pull-right"><b>1</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Hôm qua
            <span class="pull-right"><b>5</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Tuần này
            <span class="pull-right"><b>90</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Học kỳ này
            <span class="pull-right"><b>342</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Năm học này
            <span class="pull-right"><b>4225</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Toàn bộ
            <span class="pull-right"><b>8752</b> <small> ĐỀ NGHỊ</small></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- #END# Mua sắm -->
  <!-- Số lượng sửa chũa -->
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="body bg-teal">
        <div class="font-bold m-b-35">SỬA CHỮA THIẾT BỊ VĂN PHÒNG</div>
        <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)"
          data-highlight-Line-Color="#fff" data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)"
          data-spot-Color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-Width="2"
          data-line-Color="rgba(255,255,255,0.7)" data-fill-Color="rgba(0, 188, 212, 0)">
          8752,5,90,342,4225,8752
        </div>
        <ul class="dashboard-stat-list">
          <li>
            Hôm nay
            <span class="pull-right"><b>8752</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Hôm qua
            <span class="pull-right"><b>5</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Tuần này
            <span class="pull-right"><b>90</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Học kỳ này
            <span class="pull-right"><b>342</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Năm học này
            <span class="pull-right"><b>4225</b> <small> ĐỀ NGHỊ</small></span>
          </li>
          <li>
            Toàn bộ
            <span class="pull-right"><b>8752</b> <small> ĐỀ NGHỊ</small></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- #END# Số lượng sửa chũa -->
</div>

<!-- Các đề nghị mới nhất -->
<div class="clearfix">
  <div class="col-12">
    <div class="card">
      <div class="header">
        <h2>ĐỀ NGHỊ CHƯA DUYỆT MỚI NHẤT</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table table-hover dashboard-task-infos">
            <thead>
              <tr>
                <th>#</th>
                <th>Người yêu cầu</th>
                <th>Khoa/Phòng ban</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Nguyễn Văn A</td>
                <td>Điện - Điện Tử</td>
                <td>Chờ duyệt</td>
                <td>
                  <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                    <i class="material-icons">visibility</i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Nguyễn Văn A</td>
                <td>Điện - Điện Tử</td>
                <td>Chờ duyệt</td>
                <td>
                  <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                    <i class="material-icons">visibility</i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Nguyễn Văn A</td>
                <td>Điện - Điện Tử</td>
                <td>Chờ duyệt</td>
                <td>
                  <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                    <i class="material-icons">visibility</i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Nguyễn Văn A</td>
                <td>Điện - Điện Tử</td>
                <td>Chờ duyệt</td>
                <td>
                  <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                    <i class="material-icons">visibility</i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>Nguyễn Văn A</td>
                <td>Điện - Điện Tử</td>
                <td>Chờ duyệt</td>
                <td>
                  <a href="xemchitiet2.html" class="btn btn-default waves-effect">
                    <i class="material-icons">visibility</i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
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
	<!-- Jquery Core Js -->
	
	<!-- Bổ sung vào head-->
	<!-- Morris Chart Css-->
	<link href="{{ asset('dist/plugins/morrisjs/morris.css') }}" rel="stylesheet" />
	
	<!-- Morris Plugin Js -->
	<script src="{{ asset('dist/plugins/raphael/raphael.min.js') }}"></script>
	<script src="{{ asset('dist/plugins/morrisjs/morris.js') }}"></script>
	
	<!-- ChartJs -->
	<script src="{{ asset('dist/plugins/chartjs/Chart.bundle.js') }}"></script>
	
	<!-- Flot Charts Plugin Js -->
	<script src="{{ asset('dist/plugins/flot-charts/jquery.flot.js') }}"></script>
	<script src="{{ asset('dist/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
	<script src="{{ asset('dist/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
	<script src="{{ asset('dist/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
	<script src="{{ asset('dist/plugins/flot-charts/jquery.flot.time.js') }}"></script>
	
	<!-- Sparkline Chart Plugin Js -->
	<script src="{{ asset('dist/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>
	<!-- Jquery CountTo Plugin Js -->
	<script src="{{ asset('dist/plugins/jquery-countto/jquery.countTo.js') }}"></script>
@endsection

@section('script')
<script>
  function initDonutChart() {
    Morris.Donut({
        element: 'donut_chart',
        data: [{
            label: 'Thành công',
            value: 70
        }, {
            label: 'Không sửa được',
            value: 30
        }],
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
        formatter: function (y) {
            return y + '%'
        }
    });
  }
</script>
<script src="{{ asset('dist/js/pages/index.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
  $(function () {

          var start = moment().subtract(0, 'days');
          var end = moment();

          function cb(start, end) {
              $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
          }

          $('#reportrange').daterangepicker({
              startDate: start,
              endDate: end,
              ranges: {
                  'Hôm nay': [moment(), moment()],
                  'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                  '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                  '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                  'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                  'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              }
          }, cb);

          cb(start, end);

      });
      $("#DatePicker").on('DOMSubtreeModified', function () {
          alert($(this).html());
      });
</script>
<!-- End Script Bổ sung -->

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
<script src="{{ asset('dist/js/pages/forms/advanced-form-elements.js') }}"></script>
@endsection