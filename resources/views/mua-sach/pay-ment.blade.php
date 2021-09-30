@extends('mua-sach.layout')
@section('main')

  @include('mua-sach.navigation2')

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="order-summary clearfix">
              <div class="section-title">
                <h3 class="title">Xem lại giỏ hàng</h3>
              </div>
              <table class="shopping-cart-table table">
                <thead>
                  <tr>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Tổng cộng</th>
                  </tr>
                </thead>
                <tbody id="load_data">

                </tbody>
                <tfoot>
                  <tr>
                    <th class="empty" colspan="3"></th>
                    <th>TỔNG GIỎ HÀNG</th>
                    <th colspan="2" class="total-max"></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div>
          </div>
          <div class="col-md-12">
            Địa chỉ nhận hàng: {{$db_ship->address}} <a href="/api/mua-sach/edit-checkout-customer/{{$db_ship->id}}" class="btn btn-primary">Thay đổi</a>
          </div>
          <div class="col-md-12">
            <h4>Chọn hình thức thanh toán</h4>
            <form action="/api/mua-sach/order-place" method="POST">
              {{ csrf_field() }}
              <div class="payment-options"> 
                <span>
                  <label><input name="payment_option" value="0" type="checkbox">Trả bằng thẻ ATM</label>
                </span>
                <span>
                  <label><input name="payment_option" value="1" type="checkbox">Trả bằng tiền mặt</label>
                </span>
                <span><input name="payment_option" value="2" type="checkbox">Paypal</span>
                <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/mua-sach/pay-ment.js"></script>
@endsection