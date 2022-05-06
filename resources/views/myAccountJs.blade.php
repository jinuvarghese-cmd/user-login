<script>
   $(document).ready(function() {
    var user_id = $('#logged_in_user_id').attr('value');
    var base_path = '';

    fetch_data();
    fetch_user_data();

    function fetch_user_data(){
        $.ajax({
            url: "{{ route('myAccount.fetchUserDetails') }}",
            data:{
            "_token": "{{ csrf_token() }}",
            "user_id": user_id},
            method:"post",
            dataType: "json",
            success: function(data) {
               $('#username').val(data[0].username);
               $('#firstname').val(data[0].firstname);
               $('#lastname').val(data[0].lastname);
               $('#email').val(data[0].email);
            }
        });
    }

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
                    @include('editDeleteAddress')
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
              fetch_data();
             }
           })
         }else{
             $('#message').html("<div class='alert alert-danger'>Please type in the address</div>")
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