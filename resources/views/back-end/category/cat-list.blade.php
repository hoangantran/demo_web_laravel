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
     Danh Sách Mục Sản Phẩm
     <a href="{!!url('admin/danhmuc/add')!!}" title="" >
    <button type="button" class="btn btn-primary pull-right" style="margin: 11px 0 11px 0">Thêm mới danh mục</button></a>
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
            <th>Tên Danh Mục</th>
            <th>Action</th> 
          </tr>
        </thead>
       
        <tbody>
        <tr>
            <?php listcate ($data,$parent_id =0,$str=""); ?> 
        </tr> 
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--main content end-->
</section>


@endsection