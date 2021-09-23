@extends('mua-sach.layout')
@section('main')
    <section id="form">
      <div class="container">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form">
            <h2>Đăng nhập tài khoản</h2>
            <form action="/api/mua-sach/login-customer" method="POST">
              {{ csrf_field() }}
              <input type="email" name="email_account" placeholder="Email">
              <input type="password" name="password_account" placeholder="Password">
              <span>
                <input type="checkbox" class="checkbox">
                Nhớ mật khẩu
              </span>
              <button type="submit" class="btn btn-default">Đăng nhập</button>
            </form>
          </div>
        </div>
        <div class="col-sm-1">
          OR
        </div>
        <div class="col-sm-4">
          <div class="signup-form">
            <h2>Tạo mới tài khoản</h2>
            <form action="/api/mua-sach/add-customer" method="POST">
              {{ csrf_field() }}
              <input type="text" name="account_name" placeholder="Họ và tên">
              <input type="email" name="account_email" placeholder="Địa chỉ email">
              <input type="password" name="account_password" placeholder="Mật khẩu">
              <input type="text" name="account_phone" placeholder="Số điện thoại">
              <button type="submit" class="btn btn-primary">Đăng kí</button>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection