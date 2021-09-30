@extends('mua-sach.layout')
@section('main')
  @include('mua-sach.navigation2')

  <div class="section">
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="product product-details clearfix">
          <div class="col-md-6">
            <div id="product-main-view">
              <div class="product-view view-cart">
                <img src="/storage/img/{{$chitietsach->file_path}}" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-body">
              <h2 class="product-name">{{$chitietsach->name}}</h2>
              <p><strong>ID:</strong>
                {{$chitietsach->id}}
              </p>
              <p class="product-detail-price"><strong>Giá tiền:</strong> {{number_format($chitietsach->price, 0, '', '.')}} VND</p>
  
              <div class="product-btns">
                <form action="/api/mua-sach/save-cart" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{$chitietsach->id}}" name="id">
                  <div class="qty-input">
                    <span class="text-uppercase">Số lượng: </span>
                    <input class="form-control" id="qty-type" name="quantity" min="1" value="1"
                      style="display: block; width: 100px; display: inline;" type="number">
                    <div class="alert alert-danger" id="promptQty" style="display:  none;"></div>
                  </div>
                  
                  <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id != null){
                  ?>

                  <button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                  
                  <?php
                    } else {
                  ?>
                  <button type="button" class="primary-btn add-to-cart" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                  <?php
                    }
                  ?>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="product-tab">
              <ul class="tab-nav">
                <li><a data-toggle="tab" href="#tab3">Đánh giá</a></li>
              </ul>
              <div class="tab-content">
                <div id="tab3" class="tab-pane fade in active">
  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="product-reviews">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h4 class="text-uppercase">Thêm đánh giá</h4>
                      <form class="review-form" action="#">
                        <input type="hidden" name="sach_id" class="id_product_detail" value="{{$chitietsach->id}}">
                        <div class="form-group">
                          <textarea name="content" class="product_content" placeholder="Nhập đánh giá" required=""></textarea>
                        </div>
                        <?php
                          $customer_id = Session::get('customer_id');
                          if($customer_id != null) {
                        ?>
                          <button type="button" class="primary-btn send-comment">Thêm</button>
                        <?php
                          } else {
                        ?>
                          <button type="button" class="primary-btn" data-toggle="modal" data-target="#exampleModal">Thêm</button>
                        <?php      
                          }
                        ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xin chào</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Vui lòng <a href="/api/mua-sach/login-checkout" class="primary-btn">đăng nhập</a> hoặc <a href="/api/mua-sach/register-checkout" class="primary-btn">đăng kí</a> để tiếp tục
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="/js/mua-sach/chi-tiet-sach.js"></script>
@endsection