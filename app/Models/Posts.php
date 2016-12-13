<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model {
	
    protected $table = 'posts';
	protected $primaryKey ='post_id';
    public $timestamps = false;
	
	protected $fillable = ['post_id','post_title', 'post_image', 'post_content', 'post_tags', 'post_status', 'post_created_at', 'post_updated_at', 'post_category', 'post_author'];
    public static function get($post_status=null, $post_author = '', $post_category=null, $keyword = '')
    {
        if ($post_category==null&&$post_status==null)
            return \DB::table('posts')->join('categories', 'cate_id', '=', 'post_category')
                ->where([['post_author', 'like', "%$post_author%"]])
                ->where([['post_content','like',"%$keyword%",'or'],['post_tags','like',"%$keyword%",'or']])
                ->paginate('15', ['*'], 'page_post');
        if ($post_category!=null&&$post_status == null)
            return \DB::table('posts')->join('categories','cate_id','=','post_category')
                ->where([['post_category','=',$post_category],['post_author','like',"%$post_author%"]])
                ->where([['post_content','like',"%$keyword%",'or'],['post_tags','like',"%$keyword%",'or']])
                ->paginate('15',['*'],'page_post');
        if ($post_category==null&&$post_status != null)
            return \DB::table('posts')->join('categories','cate_id','=','post_category')
                ->where([['post_status','=',$post_status],['post_author','like',"%$post_author%"]])
                ->where([['post_content','like',"%$keyword%",'or'],['post_tags','like',"%$keyword%",'or']])
                ->paginate('15',['*'],'page_post');
        return \DB::table('posts')->join('categories','cate_id','=','post_category')
            ->where([['post_category','=',$post_category],['post_status','=',$post_status],['post_author','like',"%$post_author%"]])
            ->where([['post_content','like',"%$keyword%",'or'],['post_tags','like',"%$keyword%",'or']])
            ->paginate('15',['*'],'page_post');
    }
    public static function top($num = 5,$column = 'post_created_at')
    {
        return \DB::table('posts')->orderBy($column)->take($num)->get();
    }
    public static function count($post_status=null,$post_author='')
    {
        if ($post_status==null)
            return \DB::table('posts')->where([['post_author','like',"%$post_author%"]])->count();
        return \DB::table('posts')->where([['post_status','=',$post_status],['post_author','like',"%$post_author%"]])->count();
    }
    public static function view_count($post_status=null,$post_author='')
    {
        if ($post_status==null)
            return \DB::table('posts')->where([['post_author','like',"%$post_author%"]])->sum('post_view');
        return \DB::table('posts')->where([['post_status','=',$post_status],['post_author','like',"%$post_author%"]])->sum('post_view');
    }
}
