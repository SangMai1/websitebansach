
  <header>
    <div id="header">
      <div class="container">
        <div class="pull-left">
          <!-- Logo -->
          <div class="header-logo">
            <a class="logo" href="#">
              <img src="/img/logo-book.jpg" alt="">
            </a>
          </div>

          <div class="header-search">
            <form action="#" method="GET">
              <input name="txtKeyword" class="input search-input" type="text" placeholder="Nhập từ khóa">
              <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- /Search -->
        </div>
        <div class="pull-right">
          <ul class="header-btns">
            @php
                $customer_id = Session::get('customer_id');
                $customer_name = Session::get('customer_name');
            @endphp
            <!-- Account -->
            <li class="header-account dropdown default-dropdown" style="min-width: 140px">
              @if ($customer_id != null)
                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                  <strong class="text-uppercase">{{ $customer_name  }} <i class="fa fa-caret-down"></i></strong>
                </div>
                <ul class="custom-menu">
                  <li><a href="/api/mua-sach/edit-customer"><i class="fa fa-user-o"></i> Thông tin</a></li>
                  <li><a href="/api/mua-sach/product-order"><i class="fa fa-shopping-cart"></i> Đơn hàng</a></li>
                </ul>
                <a href="/api/mua-sach/logout-checkout" class="text-uppercase dang-xuat" style="cursor: pointer;">Đăng xuất</a>
              @else
                <a href="/api/mua-sach/login-checkout" class='text-uppercase dang-nhap' style="cursor: pointer;">Đăng nhập</a><br>
                <a href="/api/mua-sach/register-checkout" class="text-uppercase">Đăng ký</a>
              @endif 
            </li>
            <!-- /Account -->
  
            <!-- Cart -->
            <li class="header-cart default-dropdown" style="min-width: 170px">
              <a href="/api/mua-sach/show-cart" class="dropdown-toggle">
  
                <div class="header-btns-icon">
                  <i class="fa fa-shopping-cart"></i>
                  <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id != null) {
                  ?>
                  <span class="qty">
                    <?php
                        $count_cart = Session::get('count_cart');
                        if($count_cart != null) {
                          echo $count_cart;
                        } else {
                          echo 0;
                        }
                    ?>
                  </span>
                  <?php
                    } else {
                  ?>
                  <span class="qty">0</span>
                  <?php
                    }
                  ?>
                </div>

  
              </a>
            </li>
            <!-- /Cart -->
  
            <li class="nav-toggle">
              <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>