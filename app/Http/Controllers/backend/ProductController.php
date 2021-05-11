<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductComment;

class ProductController extends Controller
{
    public function index()
    {
        $page = 'product';
        $list = Product::where('trangthai','!=',0)->paginate(16);
        return view('product.index',compact([
            'page',
            'list'
        ]));
    }
    public function detail($slug,$id){
        $page = 'product';
        $product = Product::where('slug',$slug)->first();
        return view('product.product-detail',compact([
            'page',
            'product'
        ]));
    }

    public function indexapi(){
        $sanphams = Product::all();
        return response()->json([
			'status'  => 'Success',
			'data'    => $sanphams
		], 200);
    }

    public function review(Request $request,$id)
    {
        $request->validate([
            'message'=>'required'
        ]);
        if(!$id)
        {
            return redirect()->back()->with(['msg'=>'Server error!!!','status'=>'error']);
        }else
        {
            $review = new ProductComment();
            $review->san_pham_id = $request->id;
            $review->danh_gia = $request->message;
            $review->nguoi_dung_id = auth()->user()->id;
            $review->save();

            if($review)
            {
                return redirect()->back()->with(['msg'=>'Post review success!!!','status'=>'success']);
            }
            return redirect()->back()->with(['msg'=>'Server error!','status'=>'error']);
        }
    }

    public function replyComment(Request $request,$id)
    {
        $request->validate([
            'reply_message'=>"required",
        ]);

        if(!$id)
        {
            return redirect()->back()->with(['msg'=>'Server error!!!','status'=>'error']);
        }else
        {
            $review = ProductComment::find($id);
            if(!$review)
            {
                return redirect()->back()->with(['msg'=>"No reviews found!!!",'status'=>'error']);
            }

            $rep_review = new ProductComment();
            $rep_review->san_pham_id = $review->san_pham_id;
            $rep_review->tra_loi = $review->id;
            $rep_review->danh_gia = $request->reply_message;
            $rep_review->nguoi_dung_id = auth()->user()->id;
            $rep_review->save();

            if($rep_review)
            {
                return redirect()->back()->with(['msg'=>'Post review success!!!','status'=>'success']);
            }
            return redirect()->back()->with(['msg'=>'Server error!','status'=>'error']);
        }
    }
}
