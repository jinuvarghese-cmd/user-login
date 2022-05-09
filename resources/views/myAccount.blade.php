<x-myAccountLayout>
    <a id="myAccountAddress" href="{{ url('/myAccountAddress') }}">View Address</a>

  <form method ='post' action="{{ url('/saveUserDetails') }}">
     <div class="container">

          @if ($message = Session::get('error'))
             <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
             </div>
         @endif

         @if (count($errors) > 0)
            <div class="alert alert-danger">
               <ul>
                   @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                   @endforeach
               </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
             <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
             </div>
         @endif

     <h1>Account details</h1>
      <p>Edit</p>
      <hr>

      <label for="username"><b>UserName</b></label>
      <input type="text" name="username" id="username" required>

      <label for="firstname"><b>FirstName</b></label>
      <input type="text" name="firstname" id="firstname" required>

      <label for="lastname"><b>LastName</b></label>
      <input type="text" name="lastname" id="lastname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" name="email" id="email" required>
      <input name ="userid" value ="{{Auth::id()}}" hidden></input>
      <hr>

      <button type="submit" class="updatebtn">Update</button>
    </div>
    {{ csrf_field() }}
  </form>
</x-myAccountLayout>
