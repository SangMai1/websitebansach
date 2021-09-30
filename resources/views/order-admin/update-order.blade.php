@extends('layouts.home')
@section('css')
  <link rel="stylesheet" href="{{asset('/css/admin/addDanhMuc.css')}}" type="text/css" media="all" />
@stop
@section('content')
  <div class="main-header">
    <div class="mobile-toggle" id="mobile-toggle">
      <i class="bx bx-menu-alt-left"></i>
    </div>
    <div class="main-title">
      cập nhật đơn hàng
    </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('orderadmin.update', [$orders->id])}}}">
      @csrf
      <div class="col-12">
         <div class="btn-group">
            <input type="radio" class="btn-check" name="status" id="option1" value="0" :checked="$orders['status'] == 0 "/>
            <label class="btn btn-secondary" for="option1">Đang xử lí</label>
  
            <input type="radio" class="btn-check" name="status" id="option2" value="1" :checked="$orders['status'] == 1 " />
            <label class="btn btn-secondary" for="option2">Đang giao hàng</label>
  
            <input type="radio" class="btn-check" name="status" id="option3" value="2" :checked="$orders['status'] == 2 " />
            <label class="btn btn-secondary" for="option3">Đã nhận hàng</label>
         </div>
       </div>
  
      <div class="col-12">
        <div class="form-group">
          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <button class="btn btn-success btn-lg" type="submit">Lưu</button>
            </div>
          </div>
        </div>
      </div>
    </form>   
  </div>
@endsection