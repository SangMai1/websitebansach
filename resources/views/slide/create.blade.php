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
        thêm mới phòng
      </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('slides.create')}}" enctype="multipart/form-data">
      @csrf
      <div class="col-12">
        <div class="form-group">
          <label class="form-label">Tên</label>
          <input type="text" class="form-control" name="name" placeholder="Nhập tên" />
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label class="form-label">File</label>
          <img id="thumbnail" alt="Logo" class="img-thumbnail" style="width:100px; height: 100px">
          <input type="file" class="form-control" name="file"  accept="image/*" onchange="document.getElementById('thumbnail').src = window.URL.createObjectURL(this.files[0])" />
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
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/js/slide/create.js"></script>
@endsection