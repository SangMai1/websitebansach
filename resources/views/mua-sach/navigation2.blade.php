	<div id="navigation">
		<div class="container">
			<div id="responsive-nav">
				<div class="category-nav show-on-click">
					<span class="category-header">Danh mục <i class="fa fa-list"></i></span>
					<ul class="category-list">
						@foreach ($danhmucs as $item)
							<li class="dropdown side-dropdown">
								<a href="/api/mua-sach/sach-theo-danh-muc/{{$item->id}}" class="dropdown-toggle">{{ $item->name }}</a>
							</li>
						@endforeach
						<li><a href="/api/mua-sach/tat-ca-sach">Xem tất cả</a></li>
					</ul>
				</div>

				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="trang-chu">Trang chủ</a></li>
						<li><a href="gioi-thieu">Giới thiệu</a></li>
						<li><a href="lien-he">Liên hệ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>