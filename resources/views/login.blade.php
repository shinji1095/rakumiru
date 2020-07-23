<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
    <script type="text/javascript" src="{{ asset("script/bootstrap.js") }}"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>login</title>
  </head>
  <body>
    <div class="text-center" style="padding:50px">
	<div class="logo">login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left" action="{{ route("login.post") }}">
      {{ csrf_field() }}
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" id="lg_username" name="email" placeholder="email">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="password" placeholder="password">
					</div>
				</div>
				<button type="submit" class="login-button" formmethod="post"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>forgot your password? <a href="{{ route("forget.get") }}">click here</a></p>
				<p>new user? <a href="{{ route("register.get") }}">create new account</a></p>
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

  </body>
</html>
