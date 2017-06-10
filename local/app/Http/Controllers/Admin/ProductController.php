<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Cat;
use App\Product;
use File,DateTime;
class ProductController extends Controller
{
	public function getList()
	{
		$product = Product::paginate(5);
		return view('admin.product.list',compact('product'));
	}
    public function getAdd()
    {
    	$cat = Cat::all();
    	return view('admin.product.add',compact('cat'));
    }
     public function postAdd(Request $request)
    {
		$product                = new Product;
		$product->pro_name      = $request->pro_name;
		$product->pro_slug      = str_slug($request->pro_name);
		$product->cat_id        = $request->cat_id;
		$product->pro_price     = $request->pro_price;
		$product->pro_phukien   = $request->pro_phukien;
		$product->pro_baohanh   = $request->pro_baohanh;
		$product->pro_khuyenmai = $request->pro_khuyenmai;
		$product->pro_tinhtrang = $request->pro_tinhtrang;
		$product->pro_trangthai = $request->pro_trangthai;
		$product->pro_des       = $request->pro_des;
		$product->pro_content   = $request->pro_content;
		$product->pro_noibat    = $request->pro_noibat;

		$file = $request->file('pro_img');
		$name = $file->getClientOriginalName();
		$str_name = str_random(5)."-".$name;
		// while (file_exists('public/admin/product/'.$str_name)) {
		// 	$str_name = str_random(5)."-".$name;
		// }
		$file->move('public/admin/product/',$str_name);
		$product->pro_img = $str_name;
		$product->save();

		return redirect('admin/product/list')->with('alert','Thêm sản phẩm thành công');
    }
    public function getEdit($id)
    {
    	$cat = Cat::all();
    	$product = Product::where('id',$id)->first();
    	return view('admin.product.edit',compact('cat','product'));
    }
    public function postEdit(Request $request,$id)
    {
		$product                = Product::find($id);
		$product->pro_name      = $request->pro_name;
		$product->pro_slug      = str_slug($request->pro_name);
		$product->cat_id        = $request->cat_id;
		$product->pro_price     = $request->pro_price;
		$product->pro_phukien   = $request->pro_phukien;
		$product->pro_baohanh   = $request->pro_baohanh;
		$product->pro_khuyenmai = $request->pro_khuyenmai;
		$product->pro_tinhtrang = $request->pro_tinhtrang;
		$product->pro_trangthai = $request->pro_trangthai;
		$product->pro_des       = $request->pro_des;
		$product->pro_content   = $request->pro_content;
		$product->pro_noibat    = $request->pro_noibat;

		$old_img                = 'public/admin/product/'.$product->pro_img;
		if($request->hasFile('new_img')){
			$file             	= $request->file('new_img');
			$name             	= $file->getClientOriginalName();
			$str_name         	= str_random(5)."-".$name;
			// while (file_exists('public/admin/product/'.$str_name)) {
			// $str_name         	= str_random(5)."-".$name;
			// }
			$file->move('public/admin/product/',$str_name);
			$product->pro_img 	= $str_name;
			if(File::exists($old_img)){
			File::delete($old_img);
			}
		}

		$product->updated_at 	= new DateTime();
		$product->save();

		return redirect('admin/product/list')->with('alert','Sửa sản phẩm thành công');;
    }
    public function getDel($id){
    	$product = Product::find($id);
    	unlink('public/admin/product/'.$product->pro_img);
    	$product->delete();
    	return redirect()->back()->with('alert','Xóa sản phẩm thành công');
    }
}
