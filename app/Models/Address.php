<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function get($user_id){
        return DB::table('addresses')-> where('user_id', '=', $user_id)->orderBy('id','asc')->get();
    }

    public static function insert($data){
        return DB::table('addresses')->insert($data);
    }

    public static function deleteRow($data){
        DB::table('addresses')->where($data)->delete();
    }

    public static function updateRow($id, $address){
        DB::table('addresses')->where('id', $id)->update(['address' => $address]);
    }
}
