@extends('mua-sach.layout')
@section('main')
    <div class="container-fluid">
      <h2>Giỏ hàng</h2>
      <div class="row">
        <div class="col-lg-6 bg-success">
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
          <div class="col text-center">
            <a href="#" class="btn btn-primary">Tiếp tục mua hàng</a>
          </div>
        </div>
        <div class="col-lg-6 bg-danger">
          <div class="col text-center">
            <h3>Thành tiền: {{Cart::subTotal(0)}} đ</h3>
            <?php
              $customer_id = Session::get('customer_id');
              if($customer_id != null){
            ?>
              <a href="/api/mua-sach/checkout">Tiến hành đặt hàng</a>
              
            <?php } else {
            ?>
              <a href="/api/mua-sach/login-checkout">Tiến hành đặt hàng</a>
            <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
@endsection