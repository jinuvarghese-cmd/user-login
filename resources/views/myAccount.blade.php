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

<script>
   $(document).ready(function() {
    var user_id = $('#logged_in_user_id').attr('value');
    var base_path = '';

    fetch_data();

    function fetch_data() {
        $.ajax({
            url: "{{ route('myAccount.fetchData') }}",
            data:{
            "_token": "{{ csrf_token() }}",
            "user_id": user_id},
            method:"post",
            dataType: "json",
            success: function(data) {
                var html = '';
                html += '<tr>';
                html += '<td contenteditable id="address"></td>';
                html += '<td><button type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
    
                for(var count=0; count < data.length; count++)
                {
                    html +='<tr>';
                    html += '<td contenteditable class="column_name" data-column_name="address" data-id="'+data[count].id+'">'+data[count].address+'</td>';
                    html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';
                }
    
                $('tbody').html(html);
            }
        });
    }
});
</script>




