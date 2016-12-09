<?php

namespace App\Http\Controllers;

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
		$posts = Posts::all();

		return view('posts.index', compact('posts',$posts));
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
		return view('posts.create');
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
            'post_image' => 'required|max:256',
            'post_content' => 'required',
            'post_tags' => 'required|max:256',
            'post_status' => 'required|numeric',
            'post_created_at' => 'required|date',
            'post_updated_at' => 'required|date',
            'post_category' => 'required|max:64',
            'post_author' => 'required|max:64',

		 ]);
		 
		$posts = new Posts();

		$posts->post_title = $request->input('post_title');
		$posts->post_image = $request->input('post_image');
		$posts->post_content = $request->input('post_content');
		$posts->post_tags = $request->input('post_tags');
		$posts->post_status = $request->input('post_status');
		$posts->post_created_at = $request->input('post_created_at');
		$posts->post_updated_at = $request->input('post_updated_at');
		$posts->post_category = $request->input('post_category');
		$posts->post_author = $request->input('post_author');

		$posts->save();

		return redirect()->route('posts.index')->with('message', 'Item created successfully.');
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

		return view('posts.show', compact('posts',$posts));
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

		return view('posts.edit', compact('posts',$posts));
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
		$posts->post_image = $request->input('post_image');
		$posts->post_content = $request->input('post_content');
		$posts->post_tags = $request->input('post_tags');
		$posts->post_status = $request->input('post_status');
		$posts->post_created_at = $request->input('post_created_at');
		$posts->post_updated_at = $request->input('post_updated_at');
		$posts->post_category = $request->input('post_category');
		$posts->post_author = $request->input('post_author');

		$posts->save();

		return redirect()->route('posts.index')->with('message', 'Item updated successfully.');
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
