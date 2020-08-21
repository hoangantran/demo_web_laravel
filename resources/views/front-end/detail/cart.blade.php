@extends('front-end.layouts.detail')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
              </div>
              @elseif(Session()->has('massage'))
                <div class="alert alert-success">
                    <ul>
                        {!! Session::get('massage') !!} 
                    </ul>
                </div>
            @endif
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @foreach(Cart::content() as $row)
						<tr>
                         <!-- <?php print_r($row); ?> -->
							<td class="cart_product">
								<a href=""><img src="{!!url('uploads/products/'.$row->options->images)!!}" height="100px" width="85px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{!!$row->name!!}</a></h4>
								<p>Web ID: {!!$row->id!!}</p>
							</td>
							<td class="cart_price">
								<p>{!! number_format($row->price) !!} VNĐ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									@if (($row->qty) >1)
									<a class="cart_quantity_down" href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-down')!!}"> - </a>
									@else
									<a class="cart_quantity_down" href="{!!url('gio-hang/delete/'.$row->rowId)!!}"> - </a>
									@endif
									<input class="cart_quantity_input" type="text" name="quantity" value="{!!$row->qty!!}" autocomplete="off" size="2">
									<a class="cart_quantity_up" href="{!!url('gio-hang/update/'.$row->rowId.'/'.$row->qty.'-up')!!}"> + </a>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{!! number_format($row->qty * $row->price) !!} VNĐ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{!!url('gio-hang/delete/'.$row->rowId)!!}"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
                        @endforeach
						</tr>
							<td></td>
							<td class="cart_total_price"><h4>TỔNG TIỀN</h4></td>
							<td></td>
							<td></td>
							<td><p class="cart_total_price">{!! Cart::subtotal() !!} VNĐ</p></td>
							<td></td>
						</tr>
						</tr>
						<form class="form" action="{!! url('/dat-hang') !!}" method="get">
							<td colspan="2">
								<label class="cart_total_price">Chọn phương thức thanh toán</label>
								<select name="paymethod" id="inputPaymethod" class="form-control" required="required">
									<option value="">Hãy chọn phương thức thanh toán</option> 
									<option value="paypal">Thanh toán trực tuyến ( Paypal )</option> 
									<option value="cod"> Thanh toán khi nhận hàng ( COD )</option>
								</select>
                    		</td>
							<td></td>
							<td><button class="btn btn-default update" type="submit" >Đặt Hàng</button></td>
							<td><a class="btn btn-default check_out" href="{{route('getindex')}}">Tiếp Tục Mua Hàng </a></td>
							<td></td>
						</form>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>
    </section> <!--/#cart_items-->
    
@endsection