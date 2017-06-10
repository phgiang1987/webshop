<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Auth,DateTime;
class UserController extends Controller
{
	public function getList()
	{
		$list = User::all();
		return view('admin.user.list',compact('list'));
	}
    public function getAdd(){
    	return view('admin.user.add');
    }
    public function postAdd(UserRequest $request){

		$user           = new User;
		$user->name     = $request->name;
		$user->password = bcrypt($request->password);
		$user->email    = $request->email;
		$user->level    = $request->level;
		$user->save();

		return redirect('admin/user/list')->with('alert','Chúc mừng bạn đã đăng ký thành công');
    }
    public function getEdit($id)
    {
    	$user = User::find($id);
    	if((Auth::user()->id != 1) && ($id == 1 || $user->level == 1 &&(Auth::user()->id != $id))){
    		return redirect()->back()->with('err','Bạn không được phép sửa thành viên này');
    	}
    	return view('admin.user.edit',compact('user'));
    }
    public function postEdit(Request $request,$id)
    {
    	$user = User::find($id);
        if($request->password){
            $this->validate($request,
                [
                    'password'=>'max:10|min:3',
                    're-password'=>'same:password'
                ],
                [
                    'password.max'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
                    'password.min'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
                    're-password.same'=>'Mật khẩu không trùng khớp',
                ]);
            $user->password = bcrypt($request->password);
        }
        if(Auth::user()->id != $user->id && Auth::user()->id == 1){
            $user->level = $request->level;
        }
        $user->name = $request->name;
        $user->updated_at = new DateTime();
        $user->save();

        return redirect('admin/user/list')->with('alert','Đã sửa thành công');
    }
    public function getDel($id)
    {
        $login = Auth::user()->id;
        $delUser = User::find($id);
        if(($id == 1) || ($login != 1 && $delUser->level == 1)){
            return redirect()->back()->with('err','Bạn không được phép xóa thành viên này');
        }
        else
        {
            $delUser->delete();
            return redirect()->back()->with('alert','Bạn đã xóa thành viên này');
        }
    }
}
