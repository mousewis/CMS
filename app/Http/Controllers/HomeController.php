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
	public function setup()
    {
        if (Users::check_start()==true)
            return ('/');
        return view('home.setup');
    }
    public function _setup(Request $request)
    {
        if (Users::check_start()==true)
            return ('/');
        try{
            //validate
            $this->validate($request,
            ['user_id'=>'required|max:64',
             'user_name'=>'required|max:256',
                'user_password'=>'required|max:256',
                'user_email'=>'required|max:256',
                'opt_blog_name'=>'required|max:256',
                'opt_blog_intro'=>'required|max:256',
            ]);
            //khởi tạo database
            $this->database();
            //khởi tạo user
            $users = new Users();
            $users->user_id = $request->input('user_id');
            $users->user_password = md5($request->input('user_password'));
            $users->user_email = $request->input('user_email');
            $users->user_name = $request->input('user_name');
            $users->user_role = 'admin';
            $users->user_created_at = date('Y-m-d');
            $users->user_updated_at = date('Y-m-d');
            $users->save();
            \DB::table('options')->delete();
            //Tên website
            $options1 = new Options();
            $options1->opt_name = 'opt_blog_name';
            $options1->opt_detail = $request->input('opt_blog_name');
            $options1->opt_updated_at = date('Y-m-d H:i:s');
            $options1->save();
            //Giới thiệu website
            $options1 = new Options();
            $options1->opt_name = 'opt_blog_intro';
            $options1->opt_detail = $request->input('opt_blog_intro');
            $options1->opt_updated_at = date('Y-m-d H:i:s');
            $options1->save();
            return redirect('admin/login')->with('message','Khởi tạo thành công, vui lòng đăng nhập!');
        }
        catch (QueryException $e)
        {
            $error_code = $e->errorInfo[1];
            if ($error_code== 1062)
            {
                return redirect('setup')->with('error-message','Tên người dùng hoặc emial đã được sử dụng');
            }
            return redirect('setup')->with('error-message','Đã xảy ra lỗi');
        }
    }
    public function database()
    {
        if (\Schema::hasTable('users')==false) {
            \Schema::create('users', function (Blueprint $table) {
                $table->string('user_id',64);
                $table->string('user_password', 256);
                $table->string('user_email', 64);
                $table->string('user_name', 64);
                $table->string('user_role', 64);
                $table->dateTime('user_created_at');
                $table->dateTime('user_updated_at');
                # Indexes
                $table->primary('user_id');
                $table->unique('user_email');
            });
        }
        if (\Schema::hasTable('options')==false) {
            \Schema::create('options', function (Blueprint $table) {
                $table->increments('opt_id');
                $table->string('opt_name', 64);
                $table->string('opt_detail', 256)->nullable()->default(NULL);
                $table->dateTime('opt_updated_at')->nullable()->default(NULL);
                # Indexes
                $table->unique('opt_name');
            });
        }
        if (\Schema::hasTable('categories')==false) {
            \Schema::create('categories', function (Blueprint $table) {
                $table->increments('cate_id');
                $table->string('cate_name', 256);
                # Indexes
            });
        }
        if (\Schema::hasTable('posts')==false) {
            \Schema::create('posts', function (Blueprint $table) {
                $table->increments('post_id');
                $table->string('post_title', 256);
                $table->string('post_image', 256);
                $table->text('post_content');
                $table->string('post_tags', 256);
                $table->integer('post_status');
                $table->dateTime('post_created_at');
                $table->dateTime('post_updated_at');
                $table->integer('post_category')->unsigned();
                $table->string('post_author', 64);
                # Indexes
                $table->foreign('post_category')->references('cate_id')->on('categories');
                $table->foreign('post_author')->references('user_id')->on('users');
            });
        }
        if (\Schema::hasTable('comments')==false) {
            \Schema::create('comments', function (Blueprint $table) {
                $table->increments('comm_id');
                $table->integer('comm_post')->unsigned();
                $table->dateTime('comm_created_at');
                $table->string('comm_email', 256);
                $table->string('comm_name', 256);
                $table->string('comm_content', 256);
                # Indexes
                $table->foreign('comm_post')->references('post_id')->on('posts');
            });
        }
    }
	public function index()
	{
		$options = Options::all();

		return view('options.index', compact('options',$options));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('options/create', 'OptionsController@create')->name('options.create');
	 */
	public function create()
	{
		return view('options.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('options/store', 'OptionsController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'opt_name' => 'required|max:64',
            'opt_detail' => 'max:256',
            'opt_updated_at' => 'date',

		 ]);
		 
		$options = new Options();

		$options->opt_name = $request->input('opt_name');
		$options->opt_detail = $request->input('opt_detail');
		$options->opt_updated_at = $request->input('opt_updated_at');

		$options->save();

		return redirect()->route('options.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $opt_id
	 * @return Response
	 *
	 * Route::get('options/show/{opt_id}', 'OptionsController@show');
	 */
	public function show($opt_id)
	{
		$options = Options::findOrFail($opt_id);

		return view('options.show', compact('options',$options));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $opt_id
	 * @return Response
	 *
	 * Route::get('options/edit/{opt_id}', 'OptionsController@edit');
	 */
	public function edit($opt_id)
	{
		$options = Options::findOrFail($opt_id);

		return view('options.edit', compact('options',$options));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $opt_id
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('options/update/{opt_id}', 'OptionsController@update');
	 */
	public function update(Request $request, $opt_id)
	{
		$options = Options::findOrFail($opt_id);

		$options->opt_name = $request->input('opt_name');
		$options->opt_detail = $request->input('opt_detail');
		$options->opt_updated_at = $request->input('opt_updated_at');

		$options->save();

		return redirect()->route('options.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $opt_id
	 * @return Response
	 *
	 * Route::get('options/delete/{opt_id}', 'OptionsController@destroy');
	 */
	public function destroy($opt_id)
	{
		$options = Options::findOrFail($opt_id);
		$options->delete();

		return redirect()->route('options.index')->with('message', 'Item deleted successfully.');
	}

}
