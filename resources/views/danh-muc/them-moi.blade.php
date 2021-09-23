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
      thêm mới danh mục
    </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('danhmucs.store')}}">
      @csrf
      <div class="col-12">
        <div class="form-group">
          <label class="form-label">Tên</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" />
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
  {{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
    var $form = $("form"),
    $successMsg = $(".alert");
    $form.validate({
      rules: {
        name: {
          required: true,
          minlength: 3,
        }
      },
      messages: {
        name: "Tên không được để trống",

      },
      submitHandler: function() {
        $successMsg.show();
      }
    });
  </script>
@endsection