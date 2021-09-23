@extends('mua-sach.layout')
@section('main')
  <section class="feature1">
    <div class="card">
      <div class="row no-gutters">
        <div class="col-sm-5">
          <img src="/storage/img/{{$chitietsach->file_path}}" alt="">
        </div>
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title">{{$chitietsach->name}}</h5>
            <p>ID: {{$chitietsach->id}}</p>
            <p>Giá tiền: {{number_format($chitietsach->price)}} đ</p>
            <form action="/api/mua-sach/save-cart" method="POST">
              {{ csrf_field() }}
              <input type="hidden" value="{{$chitietsach->id}}" name="id">
              <input type="number" name="quantity" value="1">
              <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection