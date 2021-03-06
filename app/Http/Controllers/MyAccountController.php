<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Address;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    function myAccountAddress(){
        return view('myAccountAddress');
    }

    function saveUserDetails(Request $request){
        $this->validate($request, [
         'email'   => 'required|email',
        ]);

        $user_data = array(
         'username'  => $request->get('username'),
         'firstname'  => $request->get('firstname'),
         'lastname'  => $request->get('lastname'),
         'email'  => $request->get('email')
        );

        User::updateRow($request->get('userid'), $user_data);
        return redirect('/myAccount')->with('success', 'User Details Updated');
    }

    function fetchUserDetails(Request $request){
       if($request->ajax())
        {
          $data = User::getRow($request->user_id);
          echo json_encode($data);
        }
    }

    function fetchAddress(Request $request)
    {
        
      if($request->ajax())
        {
         $data = Address::get($request->user_id);
         echo json_encode($data);
        }
    }

    function addAddress(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                'user_id'    =>  $request->user_id,
                'address'     =>  $request->address
            );
            $id = Address::insert($data);
            if($id > 0)
            {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        } 
    }

    function deleteAddress(Request $request){
         if($request->ajax())
         {
             $data = array(
                'id'    =>  $request->id,
                'user_id'     =>  $request->user_id
             );

           Address::deleteRow($data);
            
           echo '<div class="alert alert-success">Data Deleted</div>';
         }
    }

    function updateAddress(Request $request){
         if($request->ajax())
         {
       
           Address::updateRow($request->id, $request->address);
            
           echo '<div class="alert alert-success">Data Updated</div>';
         }
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
