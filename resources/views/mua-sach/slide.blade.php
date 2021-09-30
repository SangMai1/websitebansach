<div id="home">
  <div class="container">
    <div class="home-wrap">
      <div id="home-slick">
        @foreach ($slides as $item)
          <a href="#" class="banner banner-1">
            <img src="/storage/img/{{$item->file_path}}" alt="">
          </a>
        @endforeach
      </div>
    </div>
  </div>
</div>