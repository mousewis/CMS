<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Comments;


class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('comments', 'CommentsController@index')->name('comments.index');
	 */
	public function index()
	{
		$comments = Comments::all();

		return view('comments.index', compact('comments',$comments));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('comments/create', 'CommentsController@create')->name('comments.create');
	 */
	public function create()
	{
		return view('comments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('comments/store', 'CommentsController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'comm_post' => 'required|numeric',
            'comm_created_at' => 'required|date',
            'comm_email' => 'required|max:256',
            'comm_name' => 'required|max:256',
            'comm_content' => 'required|max:256',

		 ]);
		 
		$comments = new Comments();

		$comments->comm_post = $request->input('comm_post');
		$comments->comm_created_at = $request->input('comm_created_at');
		$comments->comm_email = $request->input('comm_email');
		$comments->comm_name = $request->input('comm_name');
		$comments->comm_content = $request->input('comm_content');

		$comments->save();

		return redirect()->route('comments.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $comm_id
	 * @return Response
	 *
	 * Route::get('comments/show/{comm_id}', 'CommentsController@show');
	 */
	public function show($comm_id)
	{
		$comments = Comments::findOrFail($comm_id);

		return view('comments.show', compact('comments',$comments));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $comm_id
	 * @return Response
	 *
	 * Route::get('comments/edit/{comm_id}', 'CommentsController@edit');
	 */
	public function edit($comm_id)
	{
		$comments = Comments::findOrFail($comm_id);

		return view('comments.edit', compact('comments',$comments));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $comm_id
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('comments/update/{comm_id}', 'CommentsController@update');
	 */
	public function update(Request $request, $comm_id)
	{
		$comments = Comments::findOrFail($comm_id);

		$comments->comm_post = $request->input('comm_post');
		$comments->comm_created_at = $request->input('comm_created_at');
		$comments->comm_email = $request->input('comm_email');
		$comments->comm_name = $request->input('comm_name');
		$comments->comm_content = $request->input('comm_content');

		$comments->save();

		return redirect()->route('comments.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $comm_id
	 * @return Response
	 *
	 * Route::get('comments/delete/{comm_id}', 'CommentsController@destroy');
	 */
	public function destroy($comm_id)
	{
		$comments = Comments::findOrFail($comm_id);
		$comments->delete();

		return redirect()->route('comments.index')->with('message', 'Item deleted successfully.');
	}

}
