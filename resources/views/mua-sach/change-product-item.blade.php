@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')
      <!-- section -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <h4>Sản phẩm được đổi trả lại 7 ngày từ khi nhận hàng</h4>
        <form action="{{route('muasach.updatechangeproductitem')}}" method="post">
          <input type="hidden" name="order_details_id" value="{{$order_detail_id->id}}">
          <p>Lý do đổi hàng</p>
          <textarea name="reason" id="" cols="30" rows="10"></textarea>
          <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
      </div>
    </div>
@endsection