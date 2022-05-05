<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Models\Address;

class MyAccountController extends Controller
{
    function fetchData(Request $request)
    {
        
      if($request->ajax())
        {
         $data = Address::get($request->user_id);
         echo json_encode($data);
        }
    }
}
