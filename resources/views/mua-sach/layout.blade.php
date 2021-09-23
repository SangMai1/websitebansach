<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>trang chủ</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/khachhang/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="wrapper">
    <header class="header">
      <div class="container header__inner">
        <a href="#" class="header__text">Bán sách online</a>
        <div class="header__icon">
          <ul class="header__icon-list">
            <li class="header__icon-item">
              <a href="#" class="header__icon-link"><i class="fas fa-search"></i></a>
            </li>
            <?php
              $customer_id = Session::get('customer_id');
              $shipping_id = Session::get('shipping_id');
              if($customer_id != null && $shipping_id == null){
            ?>
              <li class="header__icon-item">
                <a href="/api/mua-sach/checkout" class="header__icon-link">Thanh toán</a>
              </li>
            <?php
              } elseif ($customer_id != null && $shipping_id != null) {
            ?>
              <li class="header__icon-item">
                <a href="/api/mua-sach/payment" class="header__icon-link">Thanh toán</a>
              </li>
            <?php } else {
            ?>
              <li class="header__icon-item">
                <a href="/api/mua-sach/login-checkout" class="header__icon-link">Thanh toán</a>
              </li>
            <?php } ?>
            <?php
              $customer_id = Session::get('customer_id');
              if($customer_id != null){
            ?>
              <li class="header__icon-item">
                <a href="/api/mua-sach/logout-checkout" class="header__icon-link"><i class="fas fa-user-circle dropbtn"></i>Logout</a>
              </li>
              
            <?php } else {
            ?>
              <li class="header__icon-item">
                <a href="/api/mua-sach/login-checkout" class="header__icon-link"><i class="fas fa-user-circle dropbtn"></i>Login</a>
                {{-- <div class="dropdown-content">
                  <div class="dropdown-content-li">
                    <a href="#" class="dropdown-content-li-a">Đăng nhập</a>
                    <a href="#" class="dropdown-content-li-a">Đăng ký</a>
                  </div>
                </div> --}}
              </li>
            <?php } ?>
            <li class="header__icon-item">
              <a href="#" class="header__icon-link">
                <i class="fas fa-shopping-cart"></i>
                <span class="text-shopping-cart">{{Cart::count()}}</span>
              </a>
            </li> 
          </ul>
        </div>
      </div>
    </header>

    <nav class="container menu__inner">
      <ul class="menu__inner-list">
        <li class="menu__inner-item">
          <a href="#" class="menu__inner-link">Trang chủ</a>
        </li>
        <li class="menu__inner-item">
          <a href="#" class="menu__inner-link">Giới thiệu</a>
        </li>
        <li class="menu__inner-item">
          <a href="#" class="menu__inner-link">Liên hệ</a>
        </li>
      </ul>
    </nav>

    <div class="main">
      @yield('main')
    </div>

    <footer class="footer">
			<div class="footer__top">
				<div class="container footer__container">
					<div class="footer__item">
						<h4>Giới thiệu</h4>
						<p>Trang mua sắm trực tuyến của thương hiệu thời trang Trend Fashion, thời trang nam, nữ, phụ kiện, giúp bạn tiếp cận xu hướng thời trang mới nhất.</p>
					</div>
					<div class="footer__item">
						<h4>Liên kết</h4>
						<a href="#">Tìm kiếm</a><br>
						<a href="#">Giớ thiệu</a><br>
						<a href="#">Chính sách đổi trả</a><br>
						<a href="#">Chính sách bảo mật</a><br>
						<a href="#">Điều khoản dịch vụ</a><br>
						<a href="#">Liên hệ</a>
					</div>
					<div class="footer__item">
						<h4>Thông tin liên hệ</h4>
						<p><i class="fas fa-map-marker-alt"></i>Số 18, đường Võ Văn Tần, quận Thanh Khê, Tp. Đà Nẵng.</p>
						<p><i class="fas fa-phone-alt"></i> 1900-1080</p>
					</div>
					
				</div>
			</div>
			<div class="footer__bottom">
				<p>Copyright © 2020 Trend Fashion</p>
			</div>
		</footer>
  </div>
  <script>
    let active = document.getElementsByClassName("carousel-item")[0];
    active.className += " active";
  </script>
</body>
</html>