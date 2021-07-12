@extends('master')
@section('title')
Trang chủ
@endsection
@section('breadcrumb')
{{ Breadcrumbs::render('home') }}
@endsection
@section('content')
<div class="card">
  <div class="header">
    <h2>Trang chủ</h2>
  </div>
  <div class="body">
    Xin chào
    @if (Auth::user()->LoaiTK == 1)
      {{ 'Quản trị viên' }}
    @else
      {{ Auth::user()->HoTen }}
    @endif
  </div>
</div>
@endsection