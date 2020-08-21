@extends('front-end.layouts.detail')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Orders list</li>
				</ol>
			</div><!--/breadcrums-->
			<!-- <div class="checkout-options">
				<h3>User: {!! $user->name !!}</h3>
				<p>Phone: {!! $user->phone !!}</p>
			</div> -->
			<div class="step-one">
				<h2 class="heading">Đơn hàng của tôi</h2>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr style="background-color:#FFF; height: 30px;">
							<td class="image"></td>
							<td class="description"><h5>Mã đơn hàng</h5></td>
							
							<td class="price"><h5>Ngày mua</h5></td>
							<td class="price"><h5>Tổng tiền</h5></td>
							<!-- <td class="price">Hình Thức TT</td> -->
							<td class="total"  style="text-align: center;"><h5>Trạng thái đơn hàng</h5></td>
							
						</tr>
					</thead>
					<tbody>
					@foreach($data as $row)
						<tr>
									<td></td>				
							<td class="cart_description">
								<a class="cart_quantity_delete" href="{!! url('order/detail?code='.$row->id) !!}">0031229500{!! $row->id !!}</a>
													
							</td>
							
							
							<td class="cart_price">
								{!! $row->created_at !!}
							</td>
							<td class="cart_price">
								{!! number_format($row->total) !!} ₫
							</td>
							<!-- <td class="cart_price">
								{!! $row->type !!}
							</td> -->
							<td class="cart_total" style="text-align: center;">
								@if($row->status == 0)
									<span >Chưa xác nhận</span>
								@elseif($row->status == 1)
								    <span >Đã xác nhận, chờ đóng gói...</span>
				                @elseif($row->status == 2)
				                    <span >Đang vận chuyển</span>
				                @elseif($row->status == 3)
				                    <span >Giao hàng thành công</span>
				                @else
				                    <span style="color:red">Hủy Đơn</span>    
								@endif
							</td>	
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
</section>
@endsection