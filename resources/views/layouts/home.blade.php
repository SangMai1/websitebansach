<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <link rel="stylesheet" href="/css/admin/grid.css">
  <link rel="stylesheet" href="/css/admin/style.css">
  @yield('css')
  <title>Trang admin</title>
</head>
<body>

  <div class="sidebar">
    <div class="sidebar-logo">
      <img src="/img/admin.jpg" alt="Comapny logo">
      <div class="sidebar-close" id="sidebar-close">
        <i class='bx bx-left-arrow-alt'></i>
      </div>
    </div>
    <div class="sidebar-user">
      <div class="sidebar-user-info">
        <img src="/img/anh-avatar-dep.jpg" alt="User picture" class="profile-image">
        <div class="sidebar-user-name">
          {{$username}}
        </div>
  
      </div>
      <a href="/api/logoutadmin" class="btn btn-outline">
          <i class='bx bx-log-out bx-flip-horizontal' ></i>
      </a>
    </div>


    {{-- SIDEBAR MENU --}}
    <ul class="sidebar-menu">
      <li>
        <a href="#" class="active">
          <i class="bx bx-home"></i>
          <span>trang chủ</span>
        </a>
      </li>
      <li>
        <a href="/api/slide/list">
          <i class='bx bx-chart bx-flip-horizontal' ></i>
          <span>Slide</span>
        </a>
      </li>
      <li class="sidebar-submenu">
        <a href="#" class="sider-menu-dropdown">
          <i class='bx bx-user-circle' ></i>
          <span>Quản lý nhân sự</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="/api/user/list">Nhân sự</a>
            <a href="/api/mission/list">Chức năng</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-submenu">
        <a href="#" class="sider-menu-dropdown">
          <i class='bx bxs-category'></i>
          <span>Quản lý sách</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="/api/categories/list">Danh mục</a>
            <a href="/api/book/list">Sách</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-submenu">
        <a href="/api/order-admin/danh-sach" >
          <i class='bx bxs-category'></i>
          Quản lý đơn hàng
        </a>
      </li>
      <li class="sidebar-submenu">
        <a href="/api/warehouse/list">
          <i class='bx bxs-category'></i>
          Nhập kho
        </a>

      </li>
      <li class="sidebar-submenu">
        <a href="/api/customer/list">
          <i class='bx bxs-category'></i>
          Khách hàng
        </a>
      </li>


    </ul>
  </div>

  <div class="main">
    @yield('content')
  </div>


  <div class="over-play"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script src="/js/home.js"></script>
  {{-- <script src="/js/main.js"></script> --}}
  <!-- JQuery -->

</body>
</html>