@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="order-summary clearfix">
              <div class="section-title">
                <h3 class="title">Giỏ hàng ({{$count_cart}} sản phẩm)</h3>
              </div>
                <table class="shopping-cart-table table">
                  <thead>
                    <tr>
                      <th>Chọn sản phẩm</th>
                      <th>Hình ảnh</th>
                      <th>Sản phẩm</th>
                      <th class="text-center">Giá</th>
                      <th class="text-center">Số lượng</th>
                      <th class="text-center">Tổng cộng</th>
                      <th class="text-right"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cart_buy_later as $item)
                      <tr>
                        <td><input type="checkbox" name="check_cart[]" value="{{$item->id}}" id=""></td>
                        <td class="thumb"><img src="/storage/img/{{$item->file_path}}" alt=""></td>
                        <td class="details">{{$item->product_name}}</a>
                        </td>
                        <td class="price text-center">{{number_format($item->product_price, 0, '', '.')}} VND</td>
                        <td class="qty text-center">
                          <form action="/api/mua-sach/update-cart-quantity" method="POST">
                            {{ csrf_field() }}
                            <input class="form-control qty-type" name="cart_quantity" min="1" value="{{$item->product_quantity}}" type="number">
                            <input type="hidden" name="rowId_cart" value="{{$item->id}}">
                            <button type="submit" class="btn btn-primary" name="update_qty">Cập nhật</button>  
                          </form>
                        </td>
                        <td class="total text-center primary-color"><strong class="primary-color license_price">{{number_format($item->product_price * $item->product_quantity, 0, '', '.')}}</strong> VND
                        </td>
                        <td class="text-right"><a href="/api/mua-sach/delete-to-cart/{{$item->id}}"
                            class="main-btn icon-btn"><i class="fas fa-times"></i></a></td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th class="empty" colspan="3"></th>
                      <th>TỔNG GIỎ HÀNG</th>
                      <th colspan="3" class="total-max">0</th>
                    </tr>
                  </tfoot>
                </table>
                <div class="pull-right"> 
                  @if (isset($already_exist_order))
                      <div class="cart-right-1">
                      </div>
                  @else
                      <div class="cart-right-2">
                      </div>
                  @endif
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="/js/mua-sach/gio-hang.js"></script>
@endsection