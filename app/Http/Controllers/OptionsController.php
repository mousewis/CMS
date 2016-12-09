<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Options;


class OptionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('options', 'OptionsController@index')->name('options.index');
	 */
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
