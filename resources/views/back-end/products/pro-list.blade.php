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
		<div class="col-lg-6">
            <select name="sltCate" id="inputSltCate" class="form-control" style="margin: 11px 0 11px 0">
				<option value="0">-- ROOT --</option>
					<?php MenuMulti($cat,0,$str='---| ',$loai); ?>   		
            </select>
			<script>
				document.getElementById("inputSltCate").onchange = function() {
					if (this.selectedIndex!==0) {
						window.location.href = this.value;
					}        
				};
			</script>
        </div>
		<div class="col-lg-3">
			@if ($loai !='all' )
     		<a href="{!! url('admin/sanpham/'.$loai.'/add') !!}" title="" >
    		<button type="button" class="btn btn-primary pull-right" style="margin: 11px 0 11px 0">Thêm mới danh mục</button></a>
			@endif
		</div>
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
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Mục sản Phẩm</th>
            <th>Giá bán</th>
            <th>Trạng Thái</th>
            <th>Action</th> 
          </tr>
        </thead>
       
        <tbody>
        <tr>
		@foreach($data as $pro)
            <th>{!! $pro->id !!} </th>
			<th><img src="{!!url('uploads/products/'.$pro->images)!!}" width="50" height="40"> </th>
			<th>{!! $pro->name !!} </th>
			<th>{!! $pro->category->name !!} </th>
			<th>{!! number_format($pro->price) !!} VNĐ</th>
			<th>
				@if($pro->status ==1)
					<span style="color:blue">Còn hàng</span>
				@else
				<span style="color:red">Tạm hết hàng</span>
				@endif
			</th>
			<th>
				<a href="{!!url('admin/sanpham/edit/'.$pro->id)!!}" title="Sửa">
					<span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;
				<a href="{!!url('admin/sanpham/del/'.$pro->id)!!}"  title="Xóa" onclick="return xacnhan('Xóa danh mục này ?')">
					<span class="glyphicon glyphicon-remove"></span> </a>
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