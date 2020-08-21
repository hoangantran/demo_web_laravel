@extends('back-end.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
    @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif ( Session::get('massage') )
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('massage') !!}	
						        </ul>
						    </div>
			@endif
 <div class="panel panel-default">
    <div class="panel-heading">
    	<div class="col-lg-3">Chọn Mục Sản Phẩm</div>
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
            <th>SĐT</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng Thái</th>
            <th>Action</th> 
          </tr>
        </thead>
       
        <tbody>
        <tr>
		@foreach($data as $row)
            <th>{!! $row->id !!}</th>
			<th>{!! $row->user->name !!}</th>
			<th>{!! $row->user->phone !!}</th>
			<th>{!! $row->created_at!!}</th>
			<th>{!! number_format($row->total) !!} VNĐ</th>
			<th>
				@if($row->status == 0)
					<span style="color:orange">Chưa xác nhận</span>
				@elseif($row->status == 1)
				    <span style="color:blue">Đã xác nhận</span>
                @elseif($row->status == 2)
                    <span style="color:green">Đang vận chuyển</span>
                @elseif($row->status == 3)
                    <span style="color:red">Đã giao</span>
                @else
                    <span style="color:red">Hủy Đơn</span>    
				@endif

			</th>
			<th>
                <a href="{{ url('admin/donhang/detail/'.$row->id) }}" title="Chi tiết">Chi tiết  </a> &nbsp;
				<a href="{{ url('admin/donhang/del/'.$row->id) }}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')"> Hủy bỏ</a>
            </th>
        </tr>
		@endforeach 
        </tbody>
      </table>
    </div>
	{!! $data->render() !!}
  </div>
</div>
<!--main content end-->
</section>
@endsection