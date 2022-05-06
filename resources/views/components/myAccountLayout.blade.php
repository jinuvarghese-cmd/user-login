<?php 
use Illuminate\Support\Facades\Auth;
 $user_id =Auth::id();
 ?>

 <!DOCTYPE html>
<html>
    <head>
    
    <title>My Account</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    </head>
  
    <body>

        <p id ="logged_in_user_id" value ="{{$user_id}}" hidden></p>
        <a id="logout" href="{{ url('/logout') }}">Logout</a>
        {{$slot}}

    </body>
</html>

@include('myAccountJs') 
