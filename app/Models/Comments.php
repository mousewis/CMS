<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
	
    protected $table = 'comments';
	
    public $timestamps = false;
	protected $primaryKey ='comm_id';
	protected $fillable = ['comm_post', 'comm_created_at', 'comm_email', 'comm_name', 'comm_content'];
    //trả về top
    public static function get($comm_status=null, $comm_post = null)
    {
        if (($comm_post==null)&&($comm_status==null))
            return \DB::table('comments')->paginate('15',['*'],'page_comm');
        if (($comm_status!=null)&&($comm_post==null))
            return \DB::table('comments')->where([['comm_status','=',$comm_status]])->paginate('15',['*'],'page_comm');
        if (($comm_status==null)&&($comm_post!=null))
            return \DB::table('comments')->where([['comm_post','=',$comm_post]])->paginate('15',['*'],'page_comm');
        return \DB::table('comments')->where([['comm_status','=',$comm_status],['comm_post','=',$comm_post]])->paginate('15',['*'],'page_comm');
    }
    public static function top($num = 5,$column = 'comm_created_at')
    {
        return \DB::table('comments')->orderBy($column)->take($num)->get();
    }
    public static function count($comm_status=null,$post_author='')
    {
        if ($comm_status==null)
            return \DB::table('comments')->join('posts','post_id','=','comm_post')->where([['post_author','like',"%$post_author%"]])->count();
        return \DB::table('comments')->where([['comm_status','=',$comm_status],['comm_author','like',"%$post_author%"]])->count();
    }
}
