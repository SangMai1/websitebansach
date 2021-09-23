@extends('layouts.home')
@section('css')
  <link rel="stylesheet" href="/css/admin/viewSlide.css" type="text/css" media="all" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('content')

  <div class="main-header">
      <div class="mobile-toggle" id="mobile-toggle">
        <i class='bx bx-menu-alt-left'></i>
      </div>
      <div class="main-title">
        danh sách danh mục
      </div>
  </div>
  <div class="main-content">

    {{-- Thông báo --}}
    @if (session('message'))
        <div class="alert alert-success" role="alert">
          <strong>{{session('message')}}</strong>
        </div>
    @endif

    <!-- Button trigger modal -->
      <a href="/api/slide/them-moi" class="btn btn-primary" id="createNewBook">
        Thêm mới
      </a>
      <form>
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-body overflow-scroll1">
                <table>
  
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>img</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
  
                  <tbody id="load_data">
                  </tbody>
  
                </table>
                
              </div>
            </div>
          </div>
        </div>
          
      </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script>
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
     url:"/api/slide/more-data",
     method:"POST",
     data:{limit:limit, start:start},
     cache:false,
     success:function(data)
     {
       console.log(data);
       var _html = '';
            $.each(data, function(index, value){
              let edit = "/api/slide/edit/" + value.id;
              let delete1 = "/api/slide/delete/" + value.id;
              let img = "/storage/img/" + value.file_path;
              _html += '<tr class="sang">';
                _html += '<td>' + value.id + '</td>';
                _html += '<td><img style="width:50px; height: 50px" src ="' + img + '"></td>';
                _html += '<td>' + value.name + '</td>';
                _html += '<td>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ edit +'">Update</a>';
                          _html +=  '<a class="btn btn-primary btn-rounded" href="'+ delete1 +'">Delete</a>';
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
  </script>


  
@endsection