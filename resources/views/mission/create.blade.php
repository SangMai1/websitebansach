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
      thêm mới chức năng
    </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('mission.store')}}">
      @csrf
      <div class="col-12">
        <div class="form-group">
          <label for="name" class="form-label">Tên chức năng</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên chức năng"/>

        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
        <label for="url" class="form-label">Route</label>
          <input type="text" class="form-control" id="url" name="route" placeholder="Nhập route"/>
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

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/js/mission/create.js"></script>
@endsection