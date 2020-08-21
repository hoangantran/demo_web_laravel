@extends('back-end.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
            <!-- page start-->
            @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif ( Session::get('massage'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('massage') !!}	
						        </ul>
						    </div>
			@endif
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Thông Tin Nhân Viên
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{ $data->id }}"  novalidate="novalidate">
                                    <div class="form-group ">
                                        {{ csrf_field() }}
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="name" name="name" type="text" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Username</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="username" name="username" type="text" value="{{ $data->username }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">E-mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email" value="{{ $data->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                       
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                        <input type="checkbox" id="changePassword" name="changePassword">
                                            <input class="form-control password " id="password" name="password" type="password" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="confirm_password" class="control-label col-lg-3 ">Confirm Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control password " id="confirm_password" name="confirm_password" type="password" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Lưu Thay Đổi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
<script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
</script>
<!--main content end-->
 @endsection