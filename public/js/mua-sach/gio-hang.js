      $(document).ready(function(){
        var originalPrice = +$('.total-max').html();

        var abc = $('.cart-right-2').html();

        $("input[type='checkbox']").click(function(){  
          var priceTotal = originalPrice;
          var tt = [];
          var arr = [];
          $(".shopping-cart-table input[type='checkbox']:checked").each(function(){
            var checked = $(this).val();
            arr.push(checked);
            tt += checked +"_";
            priceTotal += parseInt($(this).parents("td").siblings("td").find('.license_price').html().replace(".", ''));
          });
          
          let ta = tt.replace(/\s/g, '');
          sessionStorage.setItem("arr_cart", JSON.stringify(arr));
          sessionStorage.setItem("total_cart", JSON.stringify(priceTotal));
          $('.total-max').html(priceTotal.toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}));
          $('.total-max-header').html(priceTotal.toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}));
          $('.cart-right-2').html('<a class="primary-btn" href="/api/mua-sach/checkout/?id='+ta+'">Xác nhận giỏ hàng</a>');
        });
      });