@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="order-summary clearfix">
              <table class="shopping-cart-table table">
                <thead>
                  <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng cộng</th>
                    <th>Trạng thái</th>
                    <th>Ngày mua hàng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($product_order as $item)
                    <tr>
                      <td class="thumb">
                        {{$item->name}}
                      </td>
                      <td class="thumb"><img
                          src="/storage/img/{{$item->file_path}}" alt=""></td>
                      <td class="details">{{$item->quantity}}</td>
                      <td>{{number_format($item->price, 0, '', '.')}} VND</td>
                      <td>{{number_format($item->total, 0, '', '.')}} VND</td>
                      <td>
                        @if ($item->status == 0)
                            Đang xử lí
                        @elseif($item->status == 1)
                            Đang giao hàng
                        @else
                            Đã nhận hàng
                        @endif
                      </td>
                      <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
      
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="pull-right">
                <a href="/" class="primary-btn" style="cursor: pointer;">Tiếp tục mua hàng</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection