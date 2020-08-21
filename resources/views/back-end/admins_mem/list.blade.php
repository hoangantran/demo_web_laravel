@extends('back-end.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
    <div class="form">
      <form class="cmxform form-horizontal " id="searchForm" method="get" action="{!! url('admin/nhanvien/search') !!}"  novalidate="novalidate">
        <div class="form-group ">
          <label for="firstname" class="control-label col-lg-3">Tìm Kiếm</label>
          <div class="col-lg-6">
            <input class=" form-control" id="search" name="search" type="text">
          </div>
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
        </form>
    </div>
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
     Danh Sách Nhân Viên
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
            <th>Tên</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Chức vụ</th>
            <th >Action</th>
          </tr>
        </thead>
       
        <tbody>
        @foreach($data as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->username }}
            <td>{{ $row->email }}</td>
            <td>{{ $row->level }}</td> 
            <td class="list_td aligncenter">
              <a href="nhanvien/edit/{{ $row->id }}" title="Sửa">
                <span class="glyphicon glyphicon-edit"></span>
              </a>&nbsp;&nbsp;&nbsp;
              <a href="nhanvien/del/{{ $row->id }}" title="Xóa">
                 <span class="glyphicon glyphicon-remove"></span> 
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--main content end-->
</section>
@endsection