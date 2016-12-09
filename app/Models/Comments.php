<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
	
    protected $table = 'comments';
	
    public $timestamps = false;
	
	protected $fillable = ['comm_post', 'comm_created_at', 'comm_email', 'comm_name', 'comm_content'];
    public static function noti()
    {
        return \DB::table('comments')->orderBy('comm_created_at')->get()->forPage(1,5);
    }
}
