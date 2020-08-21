@extends('front-end.layouts.detail')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('getindex')}}">Trang Chủ</a></li>
				  <li class="active"> > Giỏ Hàng</li>
				  <li class="active"> Đặt hàng</li>
				</ol>
			</div>

			<legend> 
			<div class="heading">
				<h3>Xác nhận thông tin Đơn Hàng</h3>
			</div>
			</legend>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
						</tr>
					</thead>
					<tbody>
                        @foreach(Cart::content() as $row)
						<tr>
                         <!-- <?php print_r($row); ?> -->
							<td class="cart_product">
								<a href=""><img src="{!!url('uploads/products/'.$row->options->images)!!}" height="100px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{!!$row->name!!}</a></h4>
								<p>Web ID: {!!$row->id!!}</p>
							</td>
							<td class="cart_price">
								<p>{!! number_format($row->price) !!} VNĐ</p>
							</td>
							<td class="cart_price" style="text-align: center">								
									<p> {!!$row->qty!!} </p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{!! number_format($row->qty * $row->price) !!} VNĐ</p>
							</td>
                        </tr>
                        @endforeach
						</tr>
							<td></td>
							<td class="cart_total_price"><h4>TỔNG TIỀN</h4></td>
							<td></td>
							<td></td>
							<td><p class="cart_total_price">{!! Cart::subtotal() !!} VNĐ</p></td>
						</tr>					
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	<section id="do_action">
		<div class="container">
			<legend> 
			<div class="heading">
				<h3>Xác nhận thông tin khách hàng</h3>
				<p>Bạn cần xác nhận lại thông tin giao hàng như địa chỉ, sđt, tên khách hàng,...</p>
			</div>
			</legend>
			<div class="row">
				<div class="col-sm-9">
					@if ($_GET['paymethod'] =='cod' )
					<form action="" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
					<label>
						- Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
						- Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
						- Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
					</label>
					</div>               
					<div class="form-group">
					<label>Ghi Chú của khách hàng</label>
					<textarea name="txtnote" id="inputtxtNote" class="form-control" rows="4" required="required"></textarea>
					</div>              
					<button type="submit" class="btn btn-primary pull-right"> Đặt hàng (COD)</button> 
					</form>
				@else
					<form action="{!!url('/payment')!!}" method="Post" accept-charset="utf-8">
					{{ csrf_field() }}
					<div class="form-group">
					<label for="">
						- Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> &nbsp;
						- Điện thoại: <strong> {{ Auth::user()->phone }}</strong> &nbsp;
						- Địa chỉ: <strong> {{ Auth::user()->address }}</strong>
					</label>
					</div>
					<br>                
					<button type="submit" class="btn btn-danger pull-left"> Thanh toán qua Paypal </button> &nbsp;
				</form>
              	@endif
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
    
@endsection