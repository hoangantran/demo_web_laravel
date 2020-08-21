@extends('front-end.layouts.detail')
@section('content')
<script type="text/javascript">
	function checkemail(email){
		document.getElementById("updatesubmit").disabled = true;
		$.get(
			'checkemail',
			{email:email},
			function(data) 
			{	
				if(data != ''){			
					$('#checkemail').html(data);
				}
				else{
					$('#checkemail').html('');
					document.getElementById("updatesubmit").disabled = false;
				}																
			}
		);
	}
</script>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ route('getindex') }}">Home</a></li>
				  <li class="active">User Information</li>
				</ol>
			</div>

			<div class="step-one">
				<h2 class="heading">Quản Lí Thông Tin Thành Viên</h2>
			</div>
			<div class="row">
			<div class="col-sm-6">
    			<div class="contact-info">
    				<h2 class="title text-center">Thông Tin Thành Viên</h2>
    				<address>
    					<p>Mã thành viên:<small style="font-size: 20px;margin-left: 15px;"> 00032174500{{ $user->id }}</small><p> 
    					<p>Họ Tên:<small style="font-size: 20px;margin-left: 15px;"> {{ $user->name }}</small><p> 
    					<p>Tên Tài Khoản:<small style="font-size: 20px;margin-left: 15px;"> {{ $user->username }}</small><p> 
    					<p>Email:<small style="font-size: 20px; margin-left: 15px;"> {{ $user->email }}</small><p>  
    					<p>Địa Chỉ:<small style="font-size: 20px;margin-left: 15px;"> {{ $user->address }}</small><p>
  						<p>Số Điện Thoại:<small style="font-size: 20px;margin-left: 15px;"> {{ $user->phone }}</small><p>
    					<button>Đổi Mật Khẩu</button>
    				</address>		
    			</div>
    		</div>  	
	    		<div class="col-sm-6">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Cập Nhật Thông Tin</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="{!! url('information/update?code='.Auth::user()->id) !!}" class="contact-form row" name="contact-form" method="post">
				    		{{ csrf_field() }}
				    		
					    		<!-- <div class="form-group col-md-12">
					    			<div class="alert alert-success" style="text-align: center;" id="message"><b>{{ $message ?? '' }}</b></div>
					    		</div> -->
											
				    		<div class="form-group col-md-12">
				    			<input type="hidden" name="id" class="form-control" value="{{ $user->id }}" readonly>
				    		</div>
				            <div class="form-group col-md-12">Họ tên
				                <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
				            </div>
				            <div class="form-group col-md-12">Tên Tài Khoản
				               <input type="email" name="username" class="form-control" required value="{{ $user->username }}" readonly>
				               <p><b>*Tên tài khoản không được phép thay đổi</b></p>
				            </div>				            
				            <div class="form-group col-md-12">Email
				                <input type="text" name="email" class="form-control" required value="{{ $user->email }}" onchange="checkemail(this.value);">
				                <div id="checkemail"></div>
				            </div>
				            <div class="form-group col-md-12">Địa Chỉ
				                <input type="text" name="address" class="form-control" required value="{{ $user->address }}">
				            </div>                        
				            <div class="form-group col-md-12">Số Điện Thoại
				                <input type="text" name="phone" class="form-control" required value="{{ $user->phone }}">
				            </div>

				            <div class="form-group col-md-12">
				                <input type="submit" id="updatesubmit" name="submit" class="btn btn-primary pull-right" onsubmit="notification();" value="Cập Nhật">
				            </div>
				        </form>
	    			</div>
	    		</div>		    			
	    	</div> 
		</div>
</section>

@endsection
