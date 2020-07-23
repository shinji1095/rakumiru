<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <ul class="nav justify-content-end">
        <li class="nav-item"><a class="nav-link" href="{{ route("register.get") }}">register</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route("login.get") }}">login</a></li>
      </ul>
    </div>

    <div class="jumbotron">
      <h1 class="display-4">rakumiru</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

  </body>
</html>
