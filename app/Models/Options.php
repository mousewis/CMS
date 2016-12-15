<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Options extends Model {
	
    protected $table = 'options';
	
    public $timestamps = false;
	protected $primaryKey='opt_id';
	protected $fillable = ['opt_name', 'opt_detail', 'opt_updated_at'];
    public static function intro()
    {
        return \DB::table('options')->where('opt_name','=','opt_blog_intro')->value('opt_detail');
    }
    public static function avatar()
    {
        return \DB::table('options')->where('opt_name','=','opt_blog_avatar')->value('opt_detail');
    }
    public static function logo()
    {
        return \DB::table('options')->where('opt_name','=','opt_blog_logo')->value('opt_detail');
    }
    public static function name()
    {
        return \DB::table('options')->where('opt_name','=','opt_blog_name')->value('opt_detail');
    }
    public static function edit($opt_blog_name=null, $opt_blog_intro=null, $opt_blog_logo=null, $opt_blog_avatar=null)
    {
        if ($opt_blog_name!=null)
            \DB::table('options')->where('opt_name','=','opt_blog_name')
            ->update(['opt_updated_at'=>date('Y-m-d H:i:s'),'opt_detail'=>$opt_blog_name]);
        if ($opt_blog_intro!=null)
            \DB::table('options')->where('opt_name','=','opt_blog_intro')
            ->update(['opt_updated_at'=>date('Y-m-d H:i:s'),'opt_detail'=>$opt_blog_intro]);
        if ($opt_blog_logo!=null)
            \DB::table('options')->where('opt_name','=','opt_blog_logo')
            ->update(['opt_updated_at'=>date('Y-m-d H:i:s'),'opt_detail'=>$opt_blog_logo]);
        if ($opt_blog_avatar!=null)
            \DB::table('options')->where('opt_name','=','opt_blog_avatar')
            ->update(['opt_updated_at'=>date('Y-m-d H:i:s'),'opt_detail'=>$opt_blog_avatar]);
    }
}
