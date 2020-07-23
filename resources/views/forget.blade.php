<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>foget</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
    <script type="text/javascript" src="{{ asset("script/bootstrap.js") }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  </head>
  <body>
    <div class="text-center" style="padding:50px 0">
    	<div class="logo">forgot password</div>
    	<!-- Main Form -->
    	<div class="login-form-1">
    		<form id="forgot-password-form" class="text-left">
    			<div class="etc-login-form">
    				<p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
    			</div>
    			<div class="login-form-main-message"></div>
    			<div class="main-login-form">
    				<div class="login-group">
    					<div class="form-group">
    						<label for="fp_email" class="sr-only">Email address</label>
    						<input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
    					</div>
    				</div>
    				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
    			</div>
    			<div class="etc-login-form">
    				<p>already have an account? <a href="{{ route("login.get") }}">login here</a></p>
    				<p>new user? <a href="{{ route("register.get") }}">create new account</a></p>
    			</div>
    		</form>
    	</div>
    	<!-- end:Main Form -->
    </div>
  </body>
</html>
