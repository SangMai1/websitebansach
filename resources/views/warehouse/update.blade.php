@extends('layouts.home')
@section('css')
  <link rel="stylesheet" href="{{asset('/css/admin/addDanhMuc.css')}}" type="text/css" media="all" />
@stop
@section('content')
  <div class="main-header">
      <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-left'></i>
      </div>
      <div class="main-title">
        cập nhật sách
      </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('warehouse.update', [$nhapkhos->id])}}">
      @csrf
      <div class="col-12"> 
        <div class="form-group">
          <label class="form-label">Tên</label>
          <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="{{$nhapkhos->name}}" disabled />
        </div>
      </div>

      <div class="col-12">
         <div class="form-group" >
           <label>Danh mục</label>
           <select title="" class="form-control" name="id_danhmuc" disabled>
             @foreach($danhmuc as $key => $value)
               <option value="{{$key}}" {{ $key == $nhapkhos->id_danhmuc ? 'selected' : '' }}>{{$value}}</option>
             @endforeach
           </select>
         </div>
       </div>
      <div class="col-12">
        <div class="form-group">
          <label class="form-label">Số lượng</label>
          <input type="number" class="form-control" name="quantity" placeholder="Nhập số lượng" value="{{$nhapkhos->quantity}}" />
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label class="form-label">Giá tiền</label>
          <input type="number" class="form-control" name="price" placeholder="Nhập giá tiền" value="{{$nhapkhos->price}}" />
        </div>
      </div>
      <div class="form-group">
      <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group">
          <button class="btn btn-success btn-lg" type="submit">Lưu</button>
        </div>
      </div>
      </div>
     </form>   
  </div>
@endsection