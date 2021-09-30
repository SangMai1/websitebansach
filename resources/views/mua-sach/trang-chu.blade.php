@extends('mua-sach.layout')
@section('main')

  @include('mua-sach.navigation1')
  @include('mua-sach.slide')

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h2 class="title">Mới nhất</h2>
          </div>
        </div>

        @foreach ($sachs as $item)
          <div class="col-md-3 col-sm-6 col-xs-6 product-box">
            <div class="product product-single">
              <div class="product-thumb">
                <a href="/api/mua-sach/chi-tiet-sach/{{$item->id}}" class="main-btn quick-view" style="cursor: pointer;"><i
                    class="fa fa-search-plus"></i> Chi tiết</a>
                <img src="/storage/img/{{$item->file_path}}" alt="" height="200px">
              </div>
              <div class="product-body">
                <h2 class="product-name"><a href="#">{{$item->name}}</a></h2>
                <div class="product-rating text-center">
                  {{number_format($item->price, 0, '', '.')}} VND
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

@endsection