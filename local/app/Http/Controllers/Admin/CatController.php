<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatRequest;
use App\Cat;
class CatController extends Controller
{
	public function getList()
	{
		$cat = Cat::paginate(5);
    	return view('admin.cat.list',compact('cat'));
	}
    public function getAdd()
    {
    	$cat = Cat::all();
    	return view('admin.cat.add',compact('cat'));
    }
    public function postAdd(CatRequest $request)
    {
		$cat            = new Cat();
		$cat->cat_name  = $request->cat_name;
		$cat->cat_slug  = str_slug($request->cat_name);
		$cat->parent_id = $request->parent;
		$cat->save();

    	return redirect('admin/cat/list')->with('alert','Đã thêm danh mục thành công');
    }

    public function getEdit($id)
    {
		$cat    = Cat::find($id);
		$parent = Cat::all();
		return view('admin.cat.edit',compact('cat','parent'));
    }
    public function postEdit(CatRequest $request,$id)
    {
		$cat            = Cat::find($id);
		$cat->cat_name  = $request->cat_name;
		$cat->cat_slug  = str_slug($request->cat_name);
		$cat->parent_id = $request->parent;
		$cat->save();

		return redirect('admin/cat/list')->with('alert','Sửa danh mục thành công');
    }
    public function getDel($id)
    {
    	$kiemTra = Cat::where('parent_id',$id)->count();
    	if($kiemTra > 0)
    	{
    		return redirect()->back()->with('err','Bạn không thể xóa danh mục này');
    	}
    	else
    	{
    		$cat = Cat::find($id);
    		$cat->delete();
    		return redirect()->back()->with('alert','Bạn đã xóa danh mục này thành công');
    	}
    }
}
