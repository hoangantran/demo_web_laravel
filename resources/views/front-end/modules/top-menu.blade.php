<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{!! route('getindex') !!}"><img src="front-end/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{!! route('getcart')!!}"><i class="fa fa-shopping-cart"></i> Giỏ hàng </a></li>
								@if(Auth::user() !== null)
							
                           	    <li class="dropdown"><a href><i class="fa fa-user"></i> {!! Auth::user()->name !!}</a>
                                    <ul  class="sub-menu" style="background-color: #FFF;color: #000;width: 130px;">
                                        <li ><a href="{!! url('information') !!}" style="color: #000"><i class="fa fa-crosshairs"></i> Thông tin</a></li>
										<li><a href="{!! url('order') !!}" style="color: #000"><i class="fa fa-star"></i> Đơn hàng</a></li>
										<li><a href="{!! route('logout') !!}" style="color: #000"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                                    </ul>
                                </li> 

								@else
								<li><a href="{!! route('showlogin') !!}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{!! route('getindex') !!}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{!! route('productsall') !!}">Sản Phẩm</a></li>
										<li><a href="{!! route('getcart')!!}">Giỏ hàng</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{ route('postsearch') }}"  method="post">
								{{ csrf_field() }}
								<input type="text" placeholder="Write product name" name="value" />
								<button style="height: 33px; border: none; background-color: orange; color: #FFF">Search</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->