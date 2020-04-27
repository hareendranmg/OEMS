<!DOCTYPE html>
<html lang="en">
<head>
	<title>OEMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{URL::asset('/favicon.ico')}}"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
</head>
<body style="background-color: #e5e5e5;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="{{ url('/login') }}" class="login100-form validate-form">
                 @csrf
					<span class="login100-form-title p-b-43">
						Online Examination Management System
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
						@if ($errors->has('username'))
							<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
							</span>
							<br>
						@endif
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
						@if ($errors->has('password'))
							<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
							</span>
							<br>
						@endif


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					
					</form>

				<div class="login100-more" style="background-image: url('{{URL::asset('/img/bg-computer.jpg')}}');">
				<!-- <div class="login100-more" style="background-image: url(`{{URL::asset('/image/bg-01.jpg')}}`);"> -->
				</div>
			</div>
		</div>
	</div>
	
	

	    <script src="{{ asset('/js/bootstrap.min.js') }}"></script> 
	
	<script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>

</body>
</html>