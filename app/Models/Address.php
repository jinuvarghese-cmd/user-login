<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;

    public function get($user_id){
        return DB::table('addresses')-> where('user_id', '=', $user_id)->orderBy('id','desc')->get();
    }
}
