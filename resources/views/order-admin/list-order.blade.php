@extends('layouts.home')
@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')

  <div class="main-header">
      <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-left'></i>
      </div>
      <div class="main-title">
        danh sách đơn hàng
      </div>
  </div>
  <div class="main-content">

    {{-- Thông báo --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
          <strong>{{session('message')}}</strong>
        </div>
    @endif

      <form>
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <table>
  
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Số tiền</th>
                      <th>Trạng thái</th>
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
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="/js/order-admin/list.js"></script>
@endsection