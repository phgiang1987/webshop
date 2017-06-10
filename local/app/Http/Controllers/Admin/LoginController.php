<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class LoginController extends Controller
{
    public function getLogin()
    {
    	if(Auth::check()){
    		return redirect('admin/index');
    	}
    	else
    	{
    		return view('admin.login');
    	}
    }
    public function postLogin(Request $request)
    {
    	$login = [
    		'email'=>$request->email,
    		'password'=>$request->password,
    		'level'=>1
    	];
    	if(Auth::attempt($login)){
    		return redirect('admin/index');
    	}
    	else
    	{
    		return redirect()->back()->with('err','Đăng nhập thất bại');
    	}
    }
    public function getLogout()
    {
    	Auth::logout();
    	return redirect('login');
    }
}
