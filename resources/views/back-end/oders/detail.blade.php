@extends('back-end.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
    	<div class="col-lg-3">Chi tiết Đơn Hàng</div>
	</div>

    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

        
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
          </tr>
        </thead>
       
        <tbody>
        <tr>
            <th>{!! $oder->id !!}</th>
			<th>{!! $oder->user->name !!}</th>
            <th>{!! $oder->user->address !!}</th>
			<th>{!! $oder->user->phone !!}</th>
			<th>{!! $oder->created_at!!}</th>
			<th>{!! number_format($oder->total) !!} VNĐ</th>
        </tr>
        </tbody>
      </table>
    </div>
    
    <div class="panel-heading">						 
			Chi tiết sản phẩm trong đơn đặt hàng
	</div>
		<div class="panel-body" style="font-size: 13px;">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>										
							<th>ID</th>										
							<th>Hình ảnh</th>
							<th>Tên sản phẩm</th>
							<th>Giới thiệu sản phẩm</th>
							<th> Số lượng </th>
							<th>Giá bán</th>
							<th>Trạng thái</th>
						</tr>
					</thead>
					
                    <tbody>
					@foreach($data as $row)
						<tr>
							<td>{!!$row->id!!}</td>
							<td> <img src="{!!url('uploads/products/'.$row->images)!!}" alt="iphone" width="50" height="40"></td>
							<td>{!!$row->name!!}</td>
							<td>{!!$row->intro!!}</td>
							<td>{!!$row->qty!!} </td>
							<td>{!! number_format($row->price) !!} VNĐ</td>
							<td>
							@if($row->status ==1)
								<span style="color:blue;">Còn hàng</span>
							@else
								<span style="color:#27ae60;"> Tạm hết</span>
							@endif
							</td>
						</tr>
					@endforeach								
				    </tbody>
				</table>
			</div>
		</div>
  	</div>
	  	<form action="" method="POST" role="form">
		  	{{ csrf_field() }}
			<button type="submit" onclick="return xacnhan('Xác nhận đơn hàng này ?')"  class="btn btn-danger"> Xác nhận đơn hàng </button>
		</form>
</div>
<!--main content end-->
</section>
@endsection