@extends('master')
@section('title')
Thông tin cá nhân
@endsection
@section('content')
<!-- Thông tin tài khoản -->
<div class="row clearfix" id="TTTK">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>Thông tin tài khoản</h2>
      </div>
      <div class="body">
        <form id="form_validation" method="POST">
          <div class="row clearfix">
            <div class="col-md-6 demo-masked-input">
              <label for="">Họ tên</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">label</i>
                </span>
                <div class="form-line">
                  <input type="text" class="form-control" name="HoTen" value="{{ Auth::user()->name }}" placeholder="Họ tên"
                    disabled required />
                </div>
              </div>
            </div>

            <div class="col-md-6 demo-masked-input">
              <label for="">Ngày sinh</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">date_range</i>
                </span>
                <div class="form-line">
                  <input type="text" class="form-control date" name="NgaySinh" value="{{ Auth::user()->NgaySinh }}"
                    placeholder="Ex: 30/07/2016" disabled required>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-6 demo-masked-input">
              <label for="">CMND/CCID</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">badge</i>
                </span>
                <div class="form-line">
                  <input type="number" class="form-control" name="CMND" value="{{ Auth::user()->CMND }}" placeholder="Số CMND/CCID"
                    min="100000000" disabled required />
                </div>
              </div>
            </div>

            <div class="col-md-6 demo-masked-input">
              <label for="">Số điện thoại</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">phone</i>
                </span>
                <div class="form-line">
                  <input type="text" class="form-control sodt" name="SDT" value="{{ Auth::user()->name }}"
                    placeholder="Ex: 036-8376-080" disabled required>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-md-6 demo-masked-input">
              <label for="">Email</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">email</i>
                </span>
                <div class="form-line">
                  <input type="text" class="form-control email" name="Email" value="{{ Auth::user()->Email }}"
                    placeholder="Ex: admin@gmail.com" disabled required />
                </div>
              </div>
            </div>

            <div class="col-md-6 demo-masked-input">
              <label for="">Tên đăng nhập</label>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">person</i>
                </span>
                <div class="form-line">
                  <p class="form-control">{{ Auth::user()->TaiKhoan }}</p>
                </div>
              </div>
            </div>
          </div>
          <div style="text-align: right;">
            <button type="button" id="btn-capnhapthongtin" class="btn bg-orange waves-effect">
              <i class="material-icons">edit</i>
              <span>Cập nhập thông tin</span>
            </button>
            <button type="button" id="btn-huy" class="btn bg-red waves-effect" style="display: none;margin-left:10px">
              <i class="material-icons">cancel</i>
              <span>Hủy</span>
            </button>
            <button type="submit" id="btn-save" class="btn bg-blue waves-effect" style="display: none;">
              <i class="material-icons">save</i>
              <span>Thay đổi</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- #END# Thông tin tài khoản -->

<!-- Đổi mật khẩu -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
        <h2>Đổi mật khẩu</h2>
      </div>
      <div class="body">
        <form id="form_validation" method="POST">
          <div class="row clearfix">
            <div class="col-md-6 demo-masked-input">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                  <input type="password" class="form-control" name="MatKhau" placeholder="Mật khẩu mới" required />
                </div>
              </div>
            </div>

            <div class="col-md-6 demo-masked-input">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                  <input type="password" class="form-control" name="NLMatKhau" placeholder="Nhập lại mật khẩu mới" required />
                </div>
              </div>
            </div>
          </div>
          <div style="text-align: right;">
            <button type="submit" id="btn-doimk" class="btn bg-blue waves-effect">
              <i class="material-icons">save</i>
              <span>Lưu</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- #END# Đổi mật khẩu -->
@endsection

@section('script')
<script>
  $("#btn-capnhapthongtin").click(function () {
      $("#btn-save").css("display", "inline");
      $("#btn-huy").css("display", "inline");
      $(this).css("display", "none");
      var input = document.getElementsByTagName("input");
      for(var i=0;i<input.length;i++){
          input[i].disabled=false;
      }
  });
  $("#btn-huy").click(function () {
      $("#btn-save").css("display", "none");
      $(this).css("display", "none");
      $("#btn-capnhapthongtin").css("display", "inline");
  });
</script>
@endsection