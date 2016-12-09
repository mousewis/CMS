<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Users;


class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 *
	 * Route::get('users', 'UsersController@index')->name('users.index');
	 */
	public function login()
    {
        if (Users::check_start()==false)
            return redirect('setup');
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')=='admin')
        {
              return redirect('admin');
        }
        if (\Session::has('user_id')&&\Session::has('user_role')&&\Session::get('user_role')!='admin')
        {
            return redirect('/');
        }
        return view('admin.login');
    }
    public function _login(Request $request)
    {
        $this->validate($request,
            [
                'user_id' => 'required|max:64',
                'user_password' => 'required|max:256',
            ]);
        $result = Users::login($request->user_id, $request->user_password);
        if ($result!=null) {
            \Session::set('user_id',$result->user_id);
            \Session::set('user_role',$result->user_role);
            return redirect("admin")->with('message', 'Đăng nhập thành công');
        }
        return back()->with('error-message','Kiểm tra thông tin đăng nhập');
    }
    public function logout()
    {
        if (Users::check_start()==false)
            return redirect('setup');
        if (\Session::has('user_id')&&\Session::has('user_role'))
        {
            \Session::clear();
            return redirect('admin/login');
        }
        return view('admin.login');
    }
	public function update(Request $request, $user_id)
	{
		$users = Users::findOrFail($user_id);

		$users->uder_password = $request->input('uder_password');
		$users->user_email = $request->input('user_email');
		$users->user_name = $request->input('user_name');
		$users->user_role = $request->input('user_role');
		$users->user_created_at = $request->input('user_created_at');
		$users->user_updated_at = $request->input('user_updated_at');

		$users->save();

		return redirect()->route('users.index')->with('message', 'Item updated successfully.');
	}

}
