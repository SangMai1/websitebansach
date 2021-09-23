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
  <link rel="stylesheet" href="/css/admin/grid.css">
  <link rel="stylesheet" href="/css/admin/style.css">
  @yield('css')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
          Sang
        </div>
  
      </div>
      <button class="btn btn-outline">
          <i class='bx bx-log-out bx-flip-horizontal' ></i>
      </button>
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
        <a href="#">
          <i class='bx bx-chart bx-flip-horizontal' ></i>
          <span>thống kê</span>
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
            <a href="#">Nhân sự</a>
            <a href="#">Chức năng</a>
            <a href="#">Chức vụ</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-submenu">
        <a href="#" class="sider-menu-dropdown">
          <i class='bx bxs-category'></i>
          <span>Quản lý phòng - dịch vụ</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="#">Phòng</a>
            <a href="#">Dịch vụ</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-submenu">
        <a href="#" class="sider-menu-dropdown">
          <i class='bx bxs-category'></i>
          <span>Quản lý hóa đơn</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="#">Phiếu đặt cọc</a>
            <a href="#">Tìm hóa đơn đặt phòng, trả phòng</a>
          </li>
        </ul>
      </li>
      <li class="sidebar-submenu">
        <a href="#" class="sider-menu-dropdown">
          <i class='bx bxs-category'></i>
          <span>Quản lý khách hàng</span>
          <div class="dropdown-icon"></div>
        </a>
        <ul class="sidebar-menu sidebar-menu-dropdown-content">
          <li>
            <a href="#">Khách hàng</a>
          </li>
        </ul>
      </li>


    </ul>
  </div>

  <div class="main">
    @yield('content')
  </div>


  <div class="over-play"></div>

  <script src="/js/home.js"></script>
  {{-- <script src="/js/main.js"></script> --}}
  <!-- JQuery -->

</body>
</html>