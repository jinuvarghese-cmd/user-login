<x-myAccountLayout>
  <br />
  <br />
  <div class="container box">
   <div class="panel panel-default">
    <div class="panel-heading">Add Edit or Delete Addresses</div>
    <div class="panel-body">
     <div id="message"></div>
     <div class="table-responsive">
        
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
</x-myAccountLayout>




