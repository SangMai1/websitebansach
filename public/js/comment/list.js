$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function(){
   var limit = 10;
   var start = 0;
   var action = 'inactive';
   var n = 0;
   function loadData(limit, start)
   {
    $.ajax({
     url:"/api/review/more-data",
     method:"POST",
     data:{limit:limit, start:start},
     cache:false,
     success:function(data)
     {
       var _html = '';
            $.each(data, function(index, value){
              let edit = "/api/review/reply/" + value.id;
              let delete1 = "/api/review/delete/" + value.id;
              _html += '<tr class="sang">';
                _html += '<td>' + ++n + '</td>';
                _html += '<td>' + value.name_customer + '</td>';
                _html += '<td>' + value.name_book + '</td>';
                _html += '<td>' + value.content + '<br><ul>';
                    $.each(data, function(index1, value_rep){
                      console.log(data);
                      if(value_rep.review_parent_review == value.id){
                        _html += '<li>' + value_rep.content + '</li>';
                      }
                    });
                  _html += '</ul></td>';
                _html += '<td>' + value.create_at + '</td>';
                _html += '<td>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ edit +'">Trả lời</a>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ delete1 +'">Xóa</a>';
                _html += '</td>';
              _html += '</tr>';
            });
            $('#load_data').append(_html);
            if(data == '')
            {
            $('#load_data_message').html("<div class='active_data'><p class='active_message'>End</p></div>");
            action = 'active';
          }
          else
          {
            $('#load_data_message').html("<div class='inactive_data'><p class='inactive_message'>Loading</p></div>");
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

    $('#search').on('keyup', function(){
      var _q = $(this).val();
      var n = 0;
      $.ajax({
        url: "/api/categories/search",
        data: {
          search: _q
        },
        dataType: 'json',
        beforeSend:function(){
          $('#search').html('<li class="list-group-item">Loading...</li>')
        },
        success:function(data){
          $(".sang").remove();
          var _html = '';
          $.each(data, function(index, value){
            let edit = "/api/categories/edit/" + value.id;
            let delete1 = "/api/categories/delete/" + value.id;
            _html += '<tr class="sang">';
              _html += '<td>' + ++n + '</td>';
              _html += '<td>' + value.name + '</td>';
              _html += '<td>';
                        _html +=  '<a class="btn btn-primary btn-rounded" href="'+ edit +'">Trả lời</a>';
                        _html +=  '<a class="btn btn-primary btn-rounded" href="'+ delete1 +'">Xóa</a>';
              _html += '</td>';
            _html += '</tr>';
          });
          $('#load_data').append(_html);
        }
      });
    });    

  });

  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
  }, 2000);