@extends('layouts.home')
@section('css')
  <link rel="stylesheet" href="{{asset('/css//admin/viewSlide.css')}}" type="text/css" media="all" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')

  <div class="main-header">
      <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-left'></i>
      </div>
      <div class="main-title">
        Chi tiết đơn hàng
      </div>
  </div>
  <div class="main-content">

      <form>
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <h4>Thông tin người mua hàng</h4>
                <table>
  
                  <thead>
                    <tr>
                      <th>Tên</th>
                      <th>Email</th>
                      <th>SĐT</th>
                      <th>Địa điểm nhận hàng</th>
                    </tr>
                  </thead>
  
                  <tbody>
                    @foreach ($details_order as $item)
                      <tr>
                        <td>{{$item->name_customer}}</td>
                        <td>{{$item->email_customer}}</td>
                        <td>{{$item->phone_customer}}</td>
                        <td>{{$item->address}}</td>
                      </tr>
                    @endforeach
                  </tbody>
  
                </table>
                
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <h4>Sản phẩm đã mua</h4>
                <table>
  
                  <thead>
                    <tr>
                      <th>Tên sách</th>
                      <th>Giá tiền</th>
                      <th>Số lượng</th>
                      <th>Tổng</th>
                    </tr>
                  </thead>
  
                  <tbody>
                    @foreach ($product_order as $item)
                      <tr>
                        <td>{{$item->product_name}}</td>
                        <td>{{number_format($item->product_price, 0, '', '.')}} VND</td>
                        <td>{{$item->product_quantity}}</td>
                        <td>{{number_format($item->product_price * $item->product_quantity, 0, '', '.')}} VND</td>
                      </tr>
                    @endforeach
                  </tbody>
  
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>
@endsection