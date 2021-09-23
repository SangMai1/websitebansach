@extends('mua-sach.layout')
@section('main')
    <div>
      <div class="register-req">
        <p>Làm ơn đăng ký hoặc đăng nhập đê thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
      </div>
      <div class="shopper-infomation">
        <div class="row">
          <div class="col-sm-5 clearfix">
            <div class="bill-to">
              <p>Điền thông tin gửi hàng</p>
              <div class="form-one">
                <form action="/api/mua-sach/save-checkout-customer" method="POST">
                  {{ csrf_field() }}
                  <input type="text" name="shipping_email" placeholder="Email">
                  <input type="text" name="shipping_name" placeholder="Họ và tên">
                  <input type="text" name="shipping_address" placeholder="Địa chỉ">
                  <input type="text" name="shipping_phone" placeholder="Số điện thoại">
                  <textarea name="shipping_notes" id="" cols="30" rows="10" placeholder="Ghi chú đơn hàng của bạn"></textarea>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection