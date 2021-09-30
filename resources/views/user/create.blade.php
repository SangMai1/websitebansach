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
      thêm mới nhân sự
    </div>
  </div>
  <div class="main-content">
    <form method="post" action="{{route('user.create')}}">
       @csrf
       <div class="col-12">
        <div class="form-group">
          <label class="form-label">Tên</label>
          <input type="text" class="form-control" name="name" placeholder="Nhập tên"/>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Nhập email">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Mật khẩu</label>
          <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
        </div>
      </div>
      <div class="col-12">
        <label>Giới tính </label>
        <div class="btn-group">
           <input type="radio" class="btn-check" name="gender" id="option1" value="1" autocomplete="off" checked />
           <label class="btn btn-secondary" for="option1">Nam</label>
 
           <input type="radio" class="btn-check" name="gender" id="option2" value="2" autocomplete="off" />
           <label class="btn btn-secondary" for="option2">Nữ</label>
 
           <input type="radio" class="btn-check" name="gender" id="option3" value="3" autocomplete="off" />
           <label class="btn btn-secondary" for="option3">Khác</label>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group"> 
          <label>Ngày Sinh</label>
          <input type="date" name="date_of_birth" class="form-control" placeholder="Nhập ngày sinh">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label>CMND</label>
          <input type="text" name="cmnd" class="form-control" placeholder="Nhập cmnd">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label class="form-label" for="textAreaExample">Địa chỉ</label>
         <textarea class="form-control" id="textAreaExample" rows="6" name="address" placeholder="Nhập địa chỉ"></textarea>
       </div>
      </div>
       <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <table>
  
                  <thead>
                    <tr>
                      <th>Check</th>
                      <th>Tên chức năng</th>
                    </tr>
                  </thead>
  
                  <tbody>
                    @foreach ($idChucNang as $key => $value)
                      <tr>
                        <td><input type="checkbox" name="chucnangs[]" value="{{$key}}" /></td>
                        <td>
                          {{$value}}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
  
                </table>
                
              </div>
            </div>
          </div>
        </div>

       <div class="form-group">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button class="btn btn-success btn-lg" type="submit">Save</button>
          </div>
        </div>
       </div>
     </form>   
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="/js/user/create.js"></script>
@endsection