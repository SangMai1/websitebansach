$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(document).ready(function(){
        var originalPrice = +$('.total-max').html();
        var priceTotal = originalPrice;

        function loadData(limit)
        {
          $.ajax({
          url:"/api/mua-sach/get-payment",
          method:"POST", 
          data:{limit:limit},
          cache:false,
          success:function(data)
          {
            var _html = '';
                  $.each(data, function(index, value){
                    let img = "/storage/img/" + value.file_path;
                    _html += '<tr>';
                      _html += '<td class="thumb"><img src="' + img + '"></td>';
                      _html += '<td class="details">' + value.product_name + '</td>';
                      _html += '<td class="price text-center">' + value.product_price.toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}) + '</td>';
                      _html += '<td class="qty text-center">' + value.product_quantity + '</td>';
                      _html += '<td class="total text-center"><strong class="primary-color license_price">' + (value.product_price * value.product_quantity).toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}) + '</strong></td>';
                    _html += '</tr>';
                  });
                  $('#load_data').append(_html);
              }
            });
          }
          
          var storedArray = JSON.parse(sessionStorage.getItem("arr_cart"));//no brackets
          var i;
          for (i = 0; i < storedArray.length; i++) {
              loadData(storedArray[i]);
          }
          var totalCart = JSON.parse(sessionStorage.getItem("total_cart"));
          $('.total-max').html(totalCart.toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}));
      });