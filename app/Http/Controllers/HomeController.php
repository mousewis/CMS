<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comments;
use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Options;
use App\Users;
use Illuminate\Database\Schema\Blueprint;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('options', 'OptionsController@index')->name('options.index');
	 */
	public function home()
    {
        if (Users::check_start()==false)
            return redirect('setup');
        $categories = Categories::all();
        $top_posts = Posts::top(5);
        $posts = Posts::get(1);
        $intro = Options::intro();
        $opt_blog_logo = Options::logo();
        $opt_blog_avatar = Options::avatar();
        return view('home.home')->with(['categories'=>$categories,
            'top_posts'=>$top_posts,'posts'=>$posts,'intro'=>$intro,
        'opt_blog_logo'=>$opt_blog_logo,'opt_blog_avatar'=>$opt_blog_avatar]);

    }
    public function category($cate_id)
    {
        if (Users::check_start()==false)
            return redirect('setup');
        $categories = Categories::all();
        $top_posts = Posts::top(5);
        $posts = Posts::get(1,'',$cate_id,'');
        $intro = Options::intro();
        $opt_blog_logo = Options::logo();
        $opt_blog_avatar = Options::avatar();
        return view('home.home')->with(['categories'=>$categories,
            'top_posts'=>$top_posts,'posts'=>$posts,'intro'=>$intro,
            'opt_blog_logo'=>$opt_blog_logo,'opt_blog_avatar'=>$opt_blog_avatar]);

    }
    public function search(Request $request)
    {
        if (Users::check_start()==false)
            return redirect('setup');
        $categories = Categories::all();
        $top_posts = Posts::top(5);
        $posts = Posts::get(1,null,null,$request->input('keyword') );
        $intro = Options::intro();
        $opt_blog_logo = Options::logo();
        $opt_blog_avatar = Options::avatar();
        return view('home.home')->with(['categories'=>$categories,
            'top_posts'=>$top_posts,'posts'=>$posts,'intro'=>$intro,
            'opt_blog_logo'=>$opt_blog_logo,'opt_blog_avatar'=>$opt_blog_avatar]);
    }
    public function posts($post_id)
    {
        if (Users::check_start()==false)
            return redirect('setup');
        Posts::increase_count($post_id);
        $categories = Categories::all();
        $top_posts = Posts::top(5);
        $post = Posts::findOrFail($post_id);
        $comments = Comments::get('1',$post_id);
        $opt_blog_logo = Options::logo();
        $opt_blog_avatar = Options::avatar();
        return view('home.post')->with(['categories'=>$categories,
            'top_posts'=>$top_posts,'post'=>$post,'comments'=>$comments,
            'opt_blog_logo'=>$opt_blog_logo,'opt_blog_avatar'=>$opt_blog_avatar]);
    }
	public function about()
    {
        if (Users::check_start()==false)
            return redirect('setup');
        $categories = Categories::all();
        $top_posts = Posts::top(5);
        $posts = Posts::get(1);
        $intro = Options::intro();
        $opt_blog_logo = Options::logo();
        $opt_blog_avatar = Options::avatar();
        return view('home.about')->with(['categories'=>$categories,
            'top_posts'=>$top_posts,'posts'=>$posts,'intro'=>$intro,
            'opt_blog_logo'=>$opt_blog_logo,'opt_blog_avatar'=>$opt_blog_avatar]);
    }
}
