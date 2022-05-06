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

<script>
   $(document).ready(function() {
    var user_id = $('#logged_in_user_id').attr('value');
    var base_path = '';

    fetch_data();

    function fetch_data() {
        $.ajax({
            url: "{{ route('myAccount.fetchAddress') }}",
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
                    html += '<td contenteditable class="address" data-id="'+data[count].id+'">'+data[count].address+'</td>';
                    html += '<td><button type="button" class="btn btn-danger btn-xs update" id="'+data[count].id+'">Update</button></td>';
                    html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="'+data[count].id+'">Delete</button></td></tr>';

                }
    
                $('tbody').html(html);
            }
        });
    }

     $(document).on('click', '#add', function(){
         var address = $('#address').text();

         if(address != '')
          {
            $.ajax({
              url:"{{ route('myAccount.addAddress') }}",
              method:"POST",
              data:{
                  "_token": "{{ csrf_token() }}",
                  user_id:user_id,
                  address:address
                   },
              success:function(data)
              {
               $('#message').html(data);
               fetch_data();
              }
            });
          }
        else
         {
          $('#message').html("<div class='alert alert-danger'>Please type in the address</div>");
         }
     });

     $(document).on('click', '.update', function(){
         var address = $(this).closest('tr').find('.address').text();
         var id = $(this).attr("id");
  
         if(address != '')
         {
           $.ajax({
            url:"{{ route('myAccount.updateAddress') }}",
            method:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                address:address, 
                id:id
                },
            success:function(data)
             {
              $('#message').html(data);
             }
           })
         }
     });

      $(document).on('click', '.delete', function(){
         var id = $(this).attr("id");
         if(confirm("Are you sure you want to delete this record?"))
           {
             $.ajax({
                url:"{{ route('myAccount.deleteAddress') }}",
                method:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:id,
                    user_id:user_id
                },
                success:function(data)
                 {
                  $('#message').html(data);
                  fetch_data();
                 }
             });
           }
       });
});
</script>




