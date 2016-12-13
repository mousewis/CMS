<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Posts;

class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('posts', 'PostsController@index')->name('posts.index');
	 */
	public function index()
	{
        if (\Session::has('user_id')&&\Session::has('user_role'))
        {
                $posts = Posts::get(null,\Session::get('user_id'),null);
            return view('posts.index', compact('posts',$posts));
        }
		return redirect('/');
	}
    public function status($post_status)
    {
        if (\Session::has('user_id')&&\Session::has('user_role')) {
            $posts = Posts::get($post_status,\Session::get('user_id'),null);
            return view('posts.index', compact('posts',$posts));
        }
        return redirect('/');
    }
    public function category($post_category)
    {
        if (\Session::has('user_id')&&\Session::has('user_role')) {
            $posts = Posts::get(null, \Session::get('user_id'), $post_category);
            return view('posts.index', compact('posts',$posts));
        }
        return redirect('/');
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('posts/create', 'PostsController@create')->name('posts.create');
	 */
	public function create()
	{
        $categories = Categories::all();
		return view('posts.create')->with('categories',$categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('posts/store', 'PostsController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [
            'post_title' => 'required|max:256',
            'post_image' => 'required',
            'post_content' => 'required',
            'post_tags' => 'required|max:256',
            'post_status' => 'required',
            'post_category' => 'required|max:64',
		 ]);
        $post_id = date('Ymdhsi');
        if ($request->file('post_image')->isValid()) {
            $extension = $request->file('post_image')->extension();
            $name = $post_id . '.' . $extension;
            $request->file('post_image')->storeAs('images', $name);
        }
		$posts = new Posts();
		$posts->post_title = $request->input('post_title');
		$posts->post_image = $name;
		$posts->post_content = $request->input('post_content');
		$posts->post_tags = $request->input('post_tags');
		$posts->post_status = $request->input('post_status');
		$posts->post_created_at = date('Y-m-d H:i:s');
		$posts->post_updated_at = date('Y-m-d H:i:s');;
		$posts->post_category = $request->input('post_category');
		$posts->post_author = \Session::get('user_id');

		$posts->save();

		return redirect('admin/posts')->with('message', 'Đã thêm bài post thành công');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $post_id
	 * @return Response
	 *
	 * Route::get('posts/show/{post_id}', 'PostsController@show');
	 */
	public function show($post_id)
	{
		$posts = Posts::findOrFail($post_id);
        $categories = Categories::all();
		return view('posts.show', compact('posts',$posts))->with('categories',$categories);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $post_id
	 * @return Response
	 *
	 * Route::get('posts/edit/{post_id}', 'PostsController@edit');
	 */
	public function edit($post_id)
	{
		$posts = Posts::findOrFail($post_id);
        $categories = Categories::all();
		return view('posts.edit', compact('posts',$posts))->with('categories',$categories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $post_id
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('posts/update/{post_id}', 'PostsController@update');
	 */
	public function update(Request $request, $post_id)
	{
		$posts = Posts::findOrFail($post_id);
		$posts->post_title = $request->input('post_title');
        $post_id = date('Ymdhsi');
        if ($request->hasFile('post_image')&&$request->file('post_image')->isValid()) {
            $extension = $request->file('post_image')->extension();
            $name = $post_id . '.' . $extension;
            $request->file('post_image')->storeAs('images', $name);
            $posts->post_image = $name;
        }
		$posts->post_content = $request->input('post_content');
		$posts->post_tags = $request->input('post_tags');
		$posts->post_status = $request->input('post_status');
		$posts->post_updated_at = date('Y-m-d H:i:s');
		$posts->post_category = $request->input('post_category');
		$posts->save();

		return redirect('admin/posts')->with('message', 'Đã chỉnh sửa thành công');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $post_id
	 * @return Response
	 *
	 * Route::get('posts/delete/{post_id}', 'PostsController@destroy');
	 */
	public function destroy($post_id)
	{
		$posts = Posts::findOrFail($post_id);
		$posts->delete();

		return redirect()->route('posts.index')->with('message', 'Item deleted successfully.');
	}

}
