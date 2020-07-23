<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="D:\laravel\rakumiru\resources\views\css\register.css">
    <title>register</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
    <script type="text/javascript" src="{{ asset("script/bootstrap.js") }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  </head>
  <body>

    <!-- REGISTRATION FORM -->
    </div>
    <div class="text-center" style="padding:50px">
    	<div class="logo">register</div>
    	<!-- Main Form -->
    	<div class="login-form-1">
    		<form id="register-form" class="text-left" method="post" action="{{ route("register.post") }}">
          {{ csrf_field() }}
    			<div class="login-form-main-message"></div>
    			<div class="main-login-form">
    				<div class="login-group">
    					<div class="form-group">
    						<label for="reg_username" class="sr-only">Email address</label>
    						<input type="text" class="form-control" id="reg_username" name="username" placeholder="username">
    					</div>
    					<div class="form-group">
    						<label for="reg_password" class="sr-only">Password</label>
    						<input type="password" class="form-control" id="reg_password" name="password" placeholder="password">
    					</div>
    					<div class="form-group">
    						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
    						<input type="password" class="form-control" id="reg_password_confirm" name="password_confirm" placeholder="confirm password">
    					</div>

    					<div class="form-group">
    						<label for="reg_email" class="sr-only">Email</label>
    						<input type="text" class="form-control" id="reg_email" name="email" placeholder="email">
    					</div>

    				</div>
    				<button type="submit" class="login-button" formmethod="post"><i class="fa fa-chevron-right"></i></button>
    			</div>
    			<div class="etc-login-form">
    				<p>already have an account? <a href="{{ route("login.get") }}">login here</a></p>
    			</div>
    		</form>
    	</div>
    	<!-- end:Main Form -->
      @if (Session::has("message"))
      <div class="alert alert-warning" role="alert">
        {{ session("message") }}
      </div>
      @endif
      </div>
    </div>

  </body>
</html>
