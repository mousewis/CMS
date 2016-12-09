<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Options;
use App\Users;
use Illuminate\Database\Schema\Blueprint;

class AdminController extends Controller {

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
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            $comm_noti = Comments::noti();
            return view('admin.home')->with(['comm_noti'=>$comm_noti]);
        }
        return redirect('admin/login');
    }
	public function setup()
    {
        if (Users::check_start()==true)
            return ('/');
        return view('admin.setup');
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
            $users->user_created_at = date('Y-m-d H:i:s');
            $users->user_updated_at = date('Y-m-d H:i:s');
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
                $table->timestamp('user_created_at')->nullable();
                $table->timestamp('user_updated_at')->nullable();
                # Indexes
                $table->primary('user_id');
                $table->unique('user_email');
            });
        }
        if (\Schema::hasTable('options')==false) {
            \Schema::create('options', function (Blueprint $table) {
                $table->increments('opt_id');
                $table->string('opt_name', 64);
                $table->string('opt_detail', 256);
                $table->timestamp('opt_updated_at')->nullable();
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
                $table->string('post_image', 256)->nullable()->default('NULL');
                $table->text('post_content');
                $table->string('post_tags', 256);
                $table->integer('post_status');
                $table->timestamp('post_created_at')->nullable();
                $table->timestamp('post_updated_at')->nullable();
                $table->integer('post_view')->default(0);
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
                $table->timestamp('comm_created_at')->nullable();
                $table->string('comm_email', 256);
                $table->string('comm_name', 256);
                $table->string('comm_content', 256);
                $table->integer('post_status')->default(0);
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