$(document).ready(function(){
  load_comment();
  function load_comment(){
    var id = $('.id_product_detail').val();
    $.ajax({
      url: "/api/mua-sach/list",
      method: "POST",
      data: { id:id },
      success: function(data){
        var _html = '';
          $.each(data, function(index, value){
            _html += '<div class="single-review">';
              _html += '<div class="review-heading">';
                _html += '<div>'
                  _html += '<a href="#"><i class="fas fa-user-o"></i>' + value.name + '</a>';
                _html += '</div>'
                _html += '<div>'
                  _html += '<a href="#"><i class="fas fa-clock-o"></i>' + value.created_at + '</a>';
                _html += '</div>'
              _html += '</div>'
              _html += '<div class="review-body">'
                _html += '<p>' + value.content + '</p>';
              _html += '</div>'
            _html += '</div>'
          });

          $('.product-reviews').html(_html);
      }

    });
  }

  $('.send-comment').click(function(){
    var sach_id = $('.id_product_detail').val();
    var content = $('.product_content').val();
    $.ajax({
      url: "/api/mua-sach/create",
      method: "POST",
      data: {sach_id:sach_id, content:content},
      success: function(data){
        console.log(data);
        load_comment();
        $('.product_content').val('');
      }
    })
  })
})