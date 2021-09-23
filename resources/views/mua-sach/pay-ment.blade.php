@extends('mua-sach.layout')
@section('main')
  <div>
    <div class="review-payment">
      <h2>Xem lại giỏ hàng</h2>
      <?php
            $content = Cart::content();
          ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Tổng</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($content as $item)
            <tr>
              <td>
                <img src="/storage/img/{{$item->options->image}}" alt="">
              </td>
              <td>{{$item->name}}</td>
              <td>
                <form action="/api/mua-sach/update-cart-quantity" method="POST">
                  {{ csrf_field() }}
                  <input type="number" name="cart_quantity" value="{{$item->qty}}">
                  <input type="hidden" name="rowId_cart" value="{{$item->rowId}}">
                  <button type="submit" class="btn btn-primary" name="update_qty">Cập nhật</button>
                </form>
              </td>
              <td>{{number_format($item->price)}} đ</td>
              <td>{{number_format($item->price * $item->qty)}} đ</td>
              <td>
                <a href="/api/mua-sach/delete-to-cart/{{$item->rowId}}"><i class="fas fa-times"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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
@endsection