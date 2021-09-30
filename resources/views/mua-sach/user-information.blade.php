@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')
    <div class="section">
      <div class="container">
        <div class="row">
          <form class="clearfix" action="{{route('muasach.updatecustomer', [$customer->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="billing-details">
                <div class="section-title">
                  <h3 class="title">Thông tin người dùng</h3>
                </div>
    
                <div class="form-group">
                  <label for="txtName">Họ tên:</label>
                  <input class="input" type="text" id="txtName" value="{{$customer->name}}" name="name" placeholder="Nhập họ tên" required="">
                </div>
                <div class="form-group">
                  <label for="txtEmail">Email:</label>
                  <input class="input" type="email" id="txtEmail" value="{{$customer->email}}" name="email" placeholder="Nhập email" required="">
                </div>
                <div class="form-group">
                  <label for="txtName">Mật khẩu:</label>
                  <input class="input" type="password" id="txtPassword" value="{{$customer->password}}" name="password" placeholder="Nhập mật khẩu"
                    required="">
                </div>
                <div class="form-group">
                  <label for="txtName">Số điện thoại:</label>
                  <input class="input" type="tel" id="txtPhone" value="{{$customer->phone}}" name="phone" placeholder="Nhập số điện thoại"
                    required="">
                </div>
                <div class="form-group text-center">
                  <button class="primary-btn" type="submit">Cập nhật</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection