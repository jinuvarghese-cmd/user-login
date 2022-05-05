<!DOCTYPE html>
<html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </head>

  <body>
        <br />
      <div class="container box">
        <h3 align="center">Login</h3><br />

        <form method="post" action="{{ url('/main/checklogin') }}">
            {{ csrf_field() }}

            <div class="form-group">
               <label>Enter Email</label>
               <input type="email" name="email" class="form-control" />
            </div>

            <div class="form-group">
               <label>Enter Password</label>
               <input type="password" name="password" class="form-control" />
            </div>

            <div class="form-group">
               <input type="submit" name="login" class="btn btn-primary" value="Login" />
            </div>
        </form>
     </div>
  </body>
</html>