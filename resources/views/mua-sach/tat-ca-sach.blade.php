@extends('mua-sach.layout')
@section('main')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3">
        <ul>
          <li><a href="#">Giá 20000</a></li>
          <li><a href="#">Giá 40000</a></li>
          <li><a href="#">Giá 60000</a></li>
          <li><a href="#">Giá lớn hơn 100000</a></li>
        </ul>
      </div>
      <div class="col-lg-9">
        <div class="card-columns">
          @foreach ($sachs as $item)
            <div class="card">
              <img class="card-img-top" src="/storage/img/{{$item->file_path}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection