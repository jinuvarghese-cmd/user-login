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
     <a id="logout" href="{{ url('/logout') }}">Logout</a>
  <br />
  <br />
  
  <div class="user-details box">
   <div class="panel panel-default">
    <div class="panel-heading">User details</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
       </thead>
       <tbody id= "user-details">
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>

  <br />
  <br />
  
  <div class="container box">
   <div class="panel panel-default">
    <div class="panel-heading">Add Edit or Delete Addresses</div>
    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
         <p id ="logged_in_user_id" value ="{{$user_id}}" hidden></p>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Address</th>
         <th>Edit</th>
         <th>Delete</th>
        </tr>
       </thead>
       <tbody>
       
       </tbody>
      </table>
      {{ csrf_field() }}
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

@include('myAccountJs') 




