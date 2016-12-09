<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model {
	
    protected $table = 'users';
	
    public $timestamps = false;
	
	protected $fillable = ['user_id','user_password', 'user_email', 'user_name', 'user_role', 'user_created_at', 'user_updated_at'];

    public static function login($user_id, $user_password)
    {
        $result = \DB::table('users')->where([['user_id','=',$user_id],['user_password','=',md5($user_password)]])->first();
        return $result;
    }
    public static function check_start()
    {
        if (\Schema::hasTable('users')==false) return false;
        $result = \DB::table('users')->where([['user_role','=','admin']])->count();
        return ($result>0)?true:false;

    }
}
