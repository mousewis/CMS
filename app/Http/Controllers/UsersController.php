<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Users;


class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     *
     * Route::get('users', 'UsersController@index')->name('users.index');
     */
    public function login()
    {
        if (Users::check_start() == false)
            return redirect('setup');
        if (\Session::has('user_id') && \Session::has('user_role') && \Session::get('user_role') == 'admin') {
            return redirect('admin');
        }
        if (\Session::has('user_id') && \Session::has('user_role') && \Session::get('user_role') != 'admin') {
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
        if ($result != null) {
            \Session::set('user_id', $result->user_id);
            \Session::set('user_role', $result->user_role);
            if (\Session::get('user_role') == 'admin')
                return redirect("admin")->with('message', 'Đăng nhập thành công');
            return ('/');
        }
        return back()->with('error-message', 'Kiểm tra thông tin đăng nhập');
    }

    public function logout()
    {
        if (Users::check_start() == false)
            return redirect('setup');
        if (\Session::has('user_id') && \Session::has('user_role')) {
            \Session::clear();
            return redirect('/');
        }
        return view('admin.login');
    }

    public function edit()
    {
        if (\Session::has('user_id') && \Session::has('user_role')) {
            $users = Users::findOrFail(\Session::get('user_id'));
            return view('users.edit')->with('users', $users);
        }
        return redirect('/');
    }

    public function update(Request $request, $user_id)
    {
        if (\Session::has('user_id') && \Session::has('user_role')) {
            $users = Users::findOrFail($user_id);
            if ($request->input('user_password') != $users->user_password)
                $users->user_password = md5($request->input('user_password'));
            $users->user_email = $request->input('user_email');
            $users->user_name = $request->input('user_name');
            $users->user_updated_at = date('Y-m-d H:i:s');
            $users->save();
            return redirect((\Session::get('user_role')=='admin')?'admin':'/')->with('message', 'Đã lưu thành công');
        }
        return redirect('/');
    }

}
