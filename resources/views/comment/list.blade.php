@extends('layouts.home')
@section('css')
  <link rel="stylesheet" href="{{asset('/css//admin/viewSlide.css')}}" type="text/css" media="all" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')

  <div class="main-header">
      <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-left'></i>
      </div>
      <div class="main-title">
        danh sách danh mục
      </div>
  </div>
  <div class="main-content">

    {{-- Thêm mới --}}
    <div class="row g-3">
      <div class="col-md-6">
        <a href="/api/categories/create" class="button-them btn btn-primary">Thêm mới</a>
      </div>

      {{-- Search --}}
      <div class="col-md-6 container_seach">
        <form method="GET" action="#">
          <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Nhập tên danh mục để tìm" aria-label="Search"
              aria-describedby="search-addon" name="search" id="search" />
          </div>
        </form>
      </div>
    </div>
      <form>
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <table>
  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Người bình luận</th>
                      <th>Sách</th>
                      <th>Nội dung</th>
                      <th>Ngày bình luận</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
  
                  <tbody id="load_data">
                  </tbody>
  
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </form>
      <div id="load_data_message"></div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="/js/comment/list.js"></script>  
@endsection