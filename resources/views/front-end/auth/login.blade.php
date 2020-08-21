@extends('front-end.layouts.detail')
@section('content')
<script type="text/javascript">
	function checkusername(username){
		document.getElementById("registersubmit").disabled = true;
		$.get(
			'checkusername',
			{username:username},
			function(data) 
			{	
				if(data != ''){			
					$('#checkusername').html(data);
				}
				else{
					$('#checkusername').html('');
					document.getElementById("registersubmit").disabled = false;
				}																
			}
		);
	}
	function checkemail(email){
		document.getElementById("registersubmit").disabled = true;
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
					document.getElementById("registersubmit").disabled = false;
				}																
			}
		);
	}
	function checkpass()
	{
		document.getElementById("registersubmit").disabled = true;
		var pass = document.getElementById("password").value;
		var repass = document.getElementById("repass").value;
		if( pass != repass){
			$('#checkpass').html("<b>Password và Password nhập lại phải khớp nhau!</b>");
		}
		else{
			$('#checkpass').html('');
			document.getElementById("registersubmit").disabled = false;
		}
	}
	function validateForm() {
		var pass = document.forms["register"]["password"].value;
		var repass = document.forms["register"]["repass"].value;
		if( pass != repass){
			alert("Xin vui lòng nhập chính xác thông tin!!");
			return false;
		}
	}

</script>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập</h2>
						<form action="{!! route('postlogin') !!}" method="post">
                            @if(isset($error))
							<div class="alert alert-danger" style="text-align: center;"><b>{{ $error ?? '' }}</b></div>
							@endif
			                    {{ csrf_field() }}
							<input type="text" name="Username" placeholder="Username" required/>
							<input type="password" name="Password" placeholder="Password" required/>
							<!-- <span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span> -->
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng Ký</h2>
						<form action="{{ route('postregister') }}" name="register" method="post" onsubmit="return validateForm()">
							@if(isset($message))
							<div class="alert alert-success" style="text-align: center;" id="message"><b>{{ $message ?? '' }}</b></div>
							@endif
			                    {{ csrf_field() }}
							<input type="text" placeholder="Username" id="username" name="username" required minlength="4" maxlength="20" onchange="checkusername(this.value);"/>
							<div id="checkusername"></div>
							<input type="text" placeholder="Name" name="name" required minlength="3" maxlength="100" />
							<input type="email" placeholder="Email" name="email" required onchange="checkemail(this.value);" />
							<div id="checkemail"></div>
							<input type="number" placeholder="Phone Number" name="phone" required minlength="9" maxlength="15"/>
							<input type="text" placeholder="Adress" name="address" required minlength="10" maxlength="255"/>
                            <input type="password" placeholder="Password" name="password" id="password" required minlength="6" maxlength="16" onchange="checkpass();"/>     
                            <input type="password" placeholder="Confirm Password" name="repassword" id="repass" required minlength="6" maxlength="16" onchange="checkpass();" />
                            <div id="checkpass" style="color: red;"></div>
                            <br>				
				            <input type="submit" id="registersubmit" name="submit" class="btn btn-primary pull-right" value="Đăng Ký" style="color: #FFF">
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>	
	</section><!--/form-->
@endsection