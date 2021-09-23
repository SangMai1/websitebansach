@extends('mua-sach.layout')
@section('main')
  <div class="banner11">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach ($slides as $item)
            <div class="carousel-item">
              <img class="d-block w-100" src="/storage/img/{{$item->file_path}}" alt="slide">
            </div>    
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div class="content">
      <div class="content-left">
        <h3>Danh mục</h3>
        <ul>
          @foreach ($danhmucs as $item)
            <li><a href="/api/mua-sach/sach-theo-danh-muc/{{$item->id}}">{{$item->name}}</a></li>  
          @endforeach
        </ul>
      </div>
      <div class="content-right">
        <div class="card-columns">
          @foreach ($sachs as $item)
            <div class="card">
              <a href="/api/mua-sach/chi-tiet-sach/{{$item->id}}">
                <img class="card-img-top" src="/storage/img/{{$item->file_path}}" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{number_format($item->price)}} đ</p>
                <button class="btn btn-primary">Mua ngay</button>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection