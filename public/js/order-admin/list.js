$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function(){
   var limit = 10;
   var start = 0;
   var action = 'inactive';
   function loadData(limit, start)
   {
    $.ajax({
     url:"/api/order-admin/more-data",
     method:"POST",
     data:{limit:limit, start:start},
     cache:false,
     success:function(data)
     {
       var _html = '';
            $.each(data, function(index, value){
              let edit = "/api/order-admin/edit/" + value.id;
              let delete1 = "/api/order-admin/delete/" + value.id;
              let details = "/api/order-admin/details/" + value.id;
              _html += '<tr class="sang">';
                _html += '<td>' + value.id + '</td>';
                _html += '<td>' + value.name + '</td>';
                _html += '<td>' + value.total.toLocaleString('it-IT', {style : 'currency', currency : 'vnd'}) + '</td>';
                if(value.status == 0){
                  _html += '<td>Đang xử lí</td>';
                } else if(value.status == 1){
                  _html += '<td>Đang giao hàng</td>';
                } else {
                  _html += '<td>Đã nhận hàng</td>';
                }
                _html += '<td>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ edit +'">Update</a>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ delete1 +'">Delete</a>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ details +'">Chi tiết</a>';
                _html += '</td>';
              _html += '</tr>';
            });
            $('#load_data').append(_html);
            if(data == '')
            {
            $('#load_data_message').html("<div style='width: 100%;background:#fff;border-radius: 8px;padding:1px;margin-top: 10px;'><p style='text-align: center;font-weight: bold;'>End</p></div>'");
            action = 'active';
          }
          else
          {
            $('#load_data_message').html("<div style='width: 100%;background:#fff;border-radius: 8px;padding:1px;margin-top: 10px;'><p style='text-align: center;font-weight: bold;'>Loading</p></div>'");
            action = "inactive";
          }
        }
      });
    }

    if(action == 'inactive')
    {
      action = 'active';
      loadData(limit, start);
    }
    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
      action = 'active';
      start = start + limit;
      setTimeout(function(){
        loadData(limit, start);
        }, 100);
      }
    });

    

  });

  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
  }, 2000);