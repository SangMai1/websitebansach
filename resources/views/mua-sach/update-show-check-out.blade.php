@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')
    <div class="section">
      <div class="container">
        <div class="row">
          <form class="clearfix" action="{{route('muasach.updatecheckoutcustomer', [$shippings->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="billing-details">
                <div class="section-title">
                  <h3 class="title">Thông tin gửi hàng</h3>
                </div>
    
                <div class="form-group">
                  <label for="txtName">Họ tên:</label>
                  <input class="input" type="text" id="txtName" name="name" value="{{$shippings->name}}" placeholder="Nhập họ tên" required="">
                </div>
                <div class="form-group">
                  <label for="txtEmail">Email:</label>
                  <input class="input" type="email" id="txtEmail" name="email" value="{{$shippings->email}}" placeholder="Nhập email" required="">
                </div>
                <div class="form-group">
                  <label for="txtAddress">Địa chỉ nhận hàng:</label>
                  <input class="input" type="text" id="txtAddress" name="address" value="{{$shippings->address}}" placeholder="Nhập địa chỉ nhận hàng"
                    required="">
                </div>
                <div class="form-group">
                  <label for="txtName">Số điện thoại:</label>
                  <input class="input" type="text" id="txtPhone" name="phone" value="{{$shippings->phone}}" placeholder="Nhập số điện thoại"
                    required="">
                </div>
                <div class="form-group">
                  <label for="txtNotes">Ghi chú</label>
                  <textarea name="notes" id="" cols="30" rows="10" placeholder="Ghi chú đơn hàng của bạn">{{$shippings->notes}}</textarea>
                </div>
                <div class="form-group text-center">
                  <button class="primary-btn" type="submit">Gửi</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection