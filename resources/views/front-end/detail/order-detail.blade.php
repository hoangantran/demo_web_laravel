@extends('front-end.layouts.detail')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders detail</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="step-one">
				<h2 class="heading">Chi tiết đơn hàng #0031229500{!! $order->id !!}</h2>
			</div>
    		<div class="row"> 
    			<div class="col-sm-12">
					<div class="col-sm-5">
						<h4>Địa chỉ người nhận</h4>
					</div>
					<div class="col-sm-4">
						<h4>Hình thức giao hàng</h4>
					</div>
					<div class="col-sm-3">
						<h4>Phương thức thanh toán</h4>	
					</div>
				</div> 
				<br>
	    		<div class="col-sm-12">
	    			<div class="col-sm-5">
    					<p class="name"><h4><strong>{!! $order->user->name !!}</strong></h4></p>
    					<p><small>Địa chỉ: </small>{!! $order->user->address !!}</p>
    					<p><small>Số điện thoại: </small>{!! $order->user->phone !!}</p>
	    			</div>
	    			<div class="col-sm-4">
	    				<p>Miễn phí vận chuyển</p>
	    				<p>Giao vào ngày: {{ $order->updated_at }}</p>
	    			</div>
	    			
	    			<div class="col-sm-3">
	    				@if($order->type == 'cod')
	    				<p><small>Hình thức: </small>COD</p>
	    				@else
	    				<p><small>Hình thức: </small>PAYPAL</p>
	    				@endif

	    			</div>		
	    		</div>
	    	</div>  
	    	<div class="step-one">
				<h2 class="heading"></h2>
			</div>
	    		<div class="col-sm-12">
	    			<table class="table ">
					<thead>
						<tr style="background-color:#FFF; height: 70px;">
							<td class="image"></td>
							<td class="description" colspan="2"><h5>Sản phẩm</h5></td>
							<td class="price"><h5>Đơn giá</h5></td>
							<td class="price"><h5>Số lượng</h5></td>
							<td class="price"><h5>Giảm giá</h5></td>
							<td class="price"><h5>Tạm tính</h5></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $row)
						<tr style="height: 70px;">
							<td></td>				
							
							<td class="cart_quantity">
								<img src="{!!url('uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40">
							</td>
							<td class="cart_price">
								<a href="{!!url($row->cat_slug.'/'.$row->pro_id.'-'.$row->slug)!!}">{!!$row->name!!}</a>
							</td>
							<td class="cart_price">
								{!! number_format($row->price) !!} ₫
							</td>
							<td class="cart_price">
								{!!$row->qty!!}
							</td>
							<td class="cart_price">
								0 ₫
							</td>
							<td class="cart_price">
								{!! number_format($row->price*$row->qty) !!} ₫
							</td>
							<td>
								<button style="height: 30px;border: solid 1px #2886E3 "><a href="#">Viết nhận xét</a></button>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
    			</div>    		
    	</div>	
    </div><!--/#contact-page-->
		</div>
</section>
@endsection