@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')
    <div class="section">
      <div class="container">
        <div class="row">
          <form class="clearfix" action="/api/mua-sach/login-customer" method="post">
            {{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="billing-details">
                <div class="section-title">
                  <h3 class="title">Đăng nhập</h3>
                </div>
                <div class="form-group">
                  <label for="txtEmail">Email:</label>
                  <input class="input" type="email" id="txtEmail" name="email_account" placeholder="Nhập email" required="">
                </div>
                <div class="form-group">
                  <label for="txtName">Mật khẩu:</label>
                  <input class="input" type="password" id="txtPassword" name="password_account" placeholder="Nhập mật khẩu"
                    required="">
                </div>
                <div class="form-group text-center">
                  <span style="display: flex;">
                    <input type="checkbox" class="checkbox" style="margin: 2px;">
                    Nhớ mật khẩu
                  </span>
                  <button class="primary-btn pull-right" type="submit">Đăng nhập</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection