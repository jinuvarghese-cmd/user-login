<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function checklogin(Request $request)
    {
       $this->validate($request, [
         'email'   => 'required|email',
         'password'  => 'required|alphaNum|min:3'
       ]);

       $user_data = array(
         'email'  => $request->get('email'),
         'password' => $request->get('password')
       );

       
        if(Auth::attempt($user_data))
        {

          return redirect('/myAccount');
        }
        else
        {
         return back()->with('error', 'Wrong Login Details');
       }
    }

    function myAccount(){
        return view('myAccount');
    }   
}
