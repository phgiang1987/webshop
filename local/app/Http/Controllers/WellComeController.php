<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Product;
use DB,Auth;
use App\Customer;
use App\Comment;
use Cart,Mail,Session;
class WellComeController extends Controller
{
    public function getHome(){
    	$newPro = Product::orderBy('id','DESC')->take(8)->get();
    	$specPro = Product::where('pro_noibat',1)->take(8)->get();
    	return view('pages.home',compact('newPro','specPro'));
    }
    public function getDanhSach($id)
    {
        $cat = Cat::where('id',$id)->first();
        $listProduct = Product::where('cat_id',$id)->paginate(4);
        return view('pages.cate',compact('listProduct','cat'));
    }
    public function getChitiet($id)
    {
        $comment = Comment::where('id_sp',$id)->orderBy('id','DESC')->paginate(2);
    	$chitiet = Product::find($id);
    	return view('pages.detail',compact('chitiet','comment'));
    }
    public function getTimKiem(Request $request)
    {
        $timkiem = $request->timkiem;
        $searchProduct = Product::where('pro_name','like','%'.$timkiem.'%')->get();
        return view('pages.search',compact('timkiem','searchProduct'));
    }
    public function getDangKy()
    {
        return view('pages.dangky');
    }
    public function postDangKy(Request $request)
    {
        $this->validate($request,
            [
                'member'=>'unique:customers,name|max:30|min:2',
                'password'=>'max:10|min:3',
                're-password'=>'same:password',
                'email'=>'unique:customers,email|email'
            ],
            [
                'member.unique'=>'Tên tài khoản đã tồn tại',
                'member.max'=>'Tên tài khoản phải có độ dài từ 2 đến 30 ký tự',
                'member.min'=>'Tên tài khoản phải có độ dài từ 2 đến 30 ký tự',
                'password.max'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
                'password.min'=>'Mật khẩu phải có độ dài từ 3 đến 10 ký tự',
                're-password.same'=>'Mật khẩu phải trùng khớp',
                'email.unique'=>'Địa chỉ email đã tồn tại',
                'email.email'=>'Email không đúng định dạng'
            ]);
        $customer = new Customer;
        $customer->name = $request->member;
        $customer->password = bcrypt($request->password);
        $customer->email = $request->email;
        $customer->save();
        return redirect()->back()->with('alert','Chúc mừng bạn đã đăng ký thành công');
    }
    public function getLogin()
    {
        return view('pages.login');
    }
    public function postLogin(Request $request)
    {
        $login = [
                    'email'=>$request->email,
                    'password'=>$request->password
                ];
        if(Auth::guard('customer')->attempt($login))
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back()->with('err','Đăng nhập thất bại');
        }
    }
    public function Logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->back();
    }

    public function getMuaHang($id)
    {
        $cart = Product::where('id',$id)->first();
        Cart::add([
                'id'      => $id, 
                'name'    => $cart->pro_name, 
                'qty'     => 1, 
                'price'   => $cart->pro_price, 
                'options' => ['img' => $cart->pro_img]
            ]);
        return redirect('cart');
    }
    public function getGioHang()
    {
        $list = Cart::content();
        $totalAll = Cart::total();
        return view('pages.cart',compact('list','totalAll'));
    }
    public function postGioHang(Request $request)
    {
        $data['info'] = $request->all();
        $data['content'] = Cart::content();
        $email = $request->email;
        $name = $request->name;
        Mail::send('pages.email', $data, function($messages) use ($email, $name){
            $messages->from('admin@giangshop.info');
            $messages->to($email,$name); 
            $messages->subject('Xác nhận hóa đơn mua hàng Giangshop');
        });
        Session::flush();
        Session::flash('alert','Mua hàng thành công');
        return redirect()->intended('complex');
    }
    public function getXoaHang($id)
    {
        if($id == 0)
        {
            Cart::destroy();
            return redirect()->back()->with('alert','Xóa giỏ hàng thành công');
        }
        else
        {
            Cart::remove($id);
            return redirect()->back()->with('alert','Xóa hàng thành công');
        }
    }
    public function getCartUpdate(Request $request)
    {
       Cart::update($request->rowId,$request->qty);
       $data['totalAll'] = Cart::total()."VND";
       $content = Cart::content();
       foreach ($content as $key => $value) {
           if($value->rowId == $request->rowId){
                $data['totalPrice'] = number_format($value->price*$value->qty)."VND";
           }
       }
       echo json_encode($data);
    }
    
    public function getComplex()
    {
        return view('pages.hoanthanh');
    }
}
