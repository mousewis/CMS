<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Categories;


class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('categories', 'CategoriesController@index')->name('categories.index');
	 */
	public function index()
	{
		$categories = Categories::all();

		return view('categories.index', compact('categories',$categories));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 * Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
	 */
	public function create()
	{
		return view('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 *
	 * Route::post('categories/store', 'CategoriesController@store');
	 */
	public function store(Request $request)
	{
	     $this->validate($request, [

            'cate_name' => 'required|max:256',

		 ]);
		 
		$categories = new Categories();

		$categories->cate_name = $request->input('cate_name');

		$categories->save();

		return redirect()->route('categories.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $cate_id
	 * @return Response
	 *
	 * Route::get('categories/show/{cate_id}', 'CategoriesController@show');
	 */
	public function show($cate_id)
	{
		$categories = Categories::findOrFail($cate_id);

		return view('categories.show', compact('categories',$categories));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $cate_id
	 * @return Response
	 *
	 * Route::get('categories/edit/{cate_id}', 'CategoriesController@edit');
	 */
	public function edit($cate_id)
	{
		$categories = Categories::findOrFail($cate_id);

		return view('categories.edit', compact('categories',$categories));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $cate_id
	 * @param Request $request
	 * @return Response
	 *
	 * Route::put('categories/update/{cate_id}', 'CategoriesController@update');
	 */
	public function update(Request $request, $cate_id)
	{
		$categories = Categories::findOrFail($cate_id);

		$categories->cate_name = $request->input('cate_name');

		$categories->save();

		return redirect()->route('categories.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $cate_id
	 * @return Response
	 *
	 * Route::get('categories/delete/{cate_id}', 'CategoriesController@destroy');
	 */
	public function destroy($cate_id)
	{
		$categories = Categories::findOrFail($cate_id);
		$categories->delete();

		return redirect()->route('categories.index')->with('message', 'Item deleted successfully.');
	}

}
