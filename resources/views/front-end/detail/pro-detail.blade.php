@extends('front-end.layouts.master')
@section('content')
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{!!url('uploads/products/'.$pro->images)!!}" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{!! $pro->name !!}</h2>
								<h4>{!! $pro->intro !!}</h4>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{!! number_format($pro->price) !!} VNĐ</span>
									<span>
                                        @if($pro->status ==1)
					                        <strong style="color:blue"> Còn hàng </strong>
				                        @else
                                        <strong style="color:red">Tạm hết hàng </strong>
                                        @endif 
                                    </span>
                                    </br>
									<a href="{!!url('gio-hang/addcart/'.$pro->id)!!}"><button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào Giỏ hàng
									</button></a>
                                </span>
                                <p><b>Loại Gỗ:</b> {!! $pro->pro_details->type !!}</p>
								<p><b>Xuất sứ:</b> {!! $pro->pro_details->origin !!}</p>
								<p><b>Kích thước</b> {!! $pro->pro_details->size !!}</p>
								<p><b>Gói sản phẩm:</b> {!! $pro->pro_details->packet !!}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Thông Tin Sản Phẩm</h2>
                        <div>
                            {!! $pro->review !!}
                        </div>
                    </div>
					
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản Phẩm liên Quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                                    @foreach($proinfo as $row)	
									<div class="col-sm-4">
										<a href="{!!url($row->c_slug.'/'.$row->id.'-'.$row->slug)!!}">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{!!url('uploads/products/'.$row->images)!!}" alt="" />
													<h2>{!! number_format($pro->price) !!} VNĐ</h2>
													<p>{!! $row->name !!}</p>
													<a href="{!!url('gio-hang/addcart/'.$row->id)!!}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button></a>
												</div>
											</div>
										</div>
										</a>
                                    </div>
                                    @endforeach
								</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
    </section>
@endsection