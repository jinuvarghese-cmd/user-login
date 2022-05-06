<x-myAccountLayout>
    <a id="myAccountAddress" href="{{ url('/myAccountAddress') }}">View Address</a>

  <form method ='post' action="{{ url('/saveUserDetails') }}">
     <div class="container">
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

      <hr>

      <button type="submit" class="updatebtn">Update</button>
    </div>
    {{ csrf_field() }}
  </form>
</x-myAccountLayout>
