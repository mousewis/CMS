<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Options;
use App\Users;
use App\Posts;
use Illuminate\Database\Schema\Blueprint;
use League\Flysystem\Exception;

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
            $comm_noti = Comments::top(5);
            $comment = Comments::top(5);
            $post = Posts::top(5);
            $comm_total = Comments::count();
            $post_total = Posts::count();
            $view_total = Posts::view_count();
            return view('admin.home')->with(['comm_noti'=>$comm_noti,'comment'=>$comment,'post'=>$post,
            'comm_total'=>$comm_total,'post_total'=>$post_total,'view_total'=>$view_total]);
        }
        return redirect('admin/login');
    }
    public function comment()
    {
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            return json_encode(Comments::top(5));
        }
    }
    public function posts()
    {
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            return Posts::top(5);
        }
    }
    public function options()
    {
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            $opt_blog_name = Options::name();
            $opt_blog_intro = Options::intro();
            $opt_blog_logo = Options::logo();
            $opt_blog_avatar = Options::avatar();
            return view('admin.options')->with(['opt_blog_name'=>$opt_blog_name,
            'opt_blog_intro'=>$opt_blog_intro,
            'opt_blog_avatar'=>$opt_blog_avatar,
            'opt_blog_logo'=>$opt_blog_logo]);
        }
        return redirect('/');
    }
    public function _options(Request $request)
    {
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            //try{
            $this->validate($request, [
                'opt_blog_name'=>'required|max:256',
                'opt_blog_intro'=>'required|max:256',
            ]);
                //$opt_blog_logo = null;
                //$opt_blog_avatar =null;
            if ($request->hasFile('opt_blog_logo')&&$request->file('opt_blog_logo')->isValid())
            {
                $extension = $request->file('opt_blog_logo')->extension();
                $name = 'logo'.date('Ymdhis').'.'.$extension;
                $request->file('opt_blog_logo')->storeAs('images',$name);
                $opt_blog_logo = $name;
            }
                if ($request->hasFile('opt_blog_avatar')&&$request->file('opt_blog_avatar')->isValid())
                {
                    $extension = $request->file('opt_blog_avatar')->extension();
                    $name = 'avatar'.date('Ymdhis').'.'.$extension;
                    $request->file('opt_blog_avatar')->storeAs('images',$name);
                    $opt_blog_avatar = $name;
                }
            Options::edit($request->input('opt_blog_name'),
                $request->input('opt_blog_intro'),
                $opt_blog_logo,
                $opt_blog_avatar);
            return redirect('admin/options')->with('message','Đã chỉnh sửa thành công');
            }
            /*catch (Exception $e)
            {
                return redirect('admin/options')->with('error-message','Lỗi trong quá trình lưu');
            }
            }*/
        return redirect('/');
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
            $options1 = new Options();
            $options1->opt_name = 'opt_blog_avatar';
            $options1->opt_detail = 'avatar.png';
            $options1->opt_updated_at = date('Y-m-d H:i:s');
            $options1->save();
            $options1 = new Options();
            $options1->opt_name = 'opt_blog_logo';
            $options1->opt_detail = 'logo-1.png';
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
	public function media(){
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
            return view('admin.grid');
        }
        return redirect('/');
    }
}
