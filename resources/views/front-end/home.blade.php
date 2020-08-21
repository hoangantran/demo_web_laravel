@extends('front-end.layouts.index')
@section('content')

<!--main content start-->
<div class="col-sm-9 padding-right">
	
				<!--Sản Phẩm Mới-->
					<div class="features_items">
						<h2 class="title text-center">CÁC SẢN PHẨM MỚI</h2>
						@foreach($pronew as $row)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
											<div class="productinfo text-center">
												<img src="{!!url('uploads/products/'.$row->images)!!}" alt="" />
												<h2>{!! number_format($row->price) !!} VNĐ</h2>
												<p>{!! $row->name !!}</p>
												<a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
												<a href="{!!url($row->c_slug.'/'.$row->id.'-'.$row->slug)!!}" title="Xem chi tiết">
													<p> Khuyễn mãi</p>   
														<li>{!!$row->promo1!!}</li> 
														<li>{!!$row->promo2!!}</li> 
														<li>{!!$row->promo3!!}</li>
													<h2>{!! number_format($row->price) !!} VNĐ</h2>
													<h3>{!! $row->name !!}</h3>
													<p> {!! $row->intro !!}</p>
												</a>
													<a href="{!!url('gio-hang/addcart/'.$row->id)!!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
												</div>
											</div>
									</div>
								</div>
							</div>
						@endforeach
					</div><!--Sản Phẩm mới-->					
				</div>
			</div>
		</div>
	</section>
 @endsection