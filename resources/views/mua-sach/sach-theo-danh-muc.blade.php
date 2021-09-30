@extends('mua-sach.layout')
@section('main')

  @include('mua-sach.navigation2')

    <div class="section">
      <div class="container">
        <div class="row">
          <div id="aside" class="col-md-3">
            <div class="aside">
              <h3 class="aside-title">Giá tiền</h3>
              <ul class="list-group">
                <li class="list-group-item"><a href="#">10,000 đ - 20,000 đ</a></li>
                <li class="list-group-item"><a href="#">20,000 đ - 40,000 đ</a></li>
                <li class="list-group-item"><a href="#">40,000 đ - 60,000 đ</a></li>
                <li class="list-group-item"><a href="#">60,000 đ - 100,000 đ</a></li>
                <li class="list-group-item"><a href="#">Lớn hơn 100,000 đ</a></li>
              </ul>
            </div>
          </div>

          <div id="main" class="col-md-9">
            @foreach ($sachdanhmuc as $item)
              <div class="col-md-3 col-sm-6 col-xs-6 product-box box-height">
                <div class="product product-single box-all">
                  <div class="product-thumb">
                    <a href="/api/mua-sach/chi-tiet-sach/{{$item->id}}" class="main-btn quick-view" style="cursor: pointer;"><i
                        class="fa fa-search-plus"></i> Chi tiết</a>
                    <img src="/storage/img/{{$item->file_path}}" alt="" height="200px">
                  </div>
                  <div class="product-body">
                    <h2 class="product-name"><a href="#">{{$item->name}}</a></h2>
                    <div class="product-rating text-center">
                      {{number_format($item->price)}} đ
                    </div>
                    <div class="product-btns text-center">
                      <a href="#" class="primary-btn add-to-cart cart-size"><i
                          class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection