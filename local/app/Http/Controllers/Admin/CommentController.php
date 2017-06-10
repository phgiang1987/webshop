<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Cat;
use App\Customer;
use Auth,DateTime;
use App\Comment;
class CommentController extends Controller
{
    public function Comment(Request $request,$id){
    	$product = Product::find($id);
    	$comment = new Comment();
    	$comment->id_sp = $product->id;
    	$comment->id_customer = Auth::guard('customer')->user()->id;
    	$comment->content = $request->binhluan;
    	$comment->save();

    	return redirect('chi-tiet/'.$product->id.'/'.$product->slug.'.html')->with('alert','Viết bình luận thành công');
    }
    // public function getList(){
    //     $list = Comment::paginate(5);
    //     return view('admin.comment.list',compact('list'));
    // }
    // public function getDel($id){
    //     $del = Comment::find($id);
    //     $del->delete();
    //     return redirect()->back()->with('alert','Xóa thành công');
    // }
}
