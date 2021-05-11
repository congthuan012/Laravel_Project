<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $page = 'blog';
        $blog_list = BlogModel::paginate(4);
        return view('blog.index',compact(['page','blog_list']));
    }
    public function detail($slug ,$id){
        $page = 'blog';
        $blog = BlogModel::where('slug',$slug)->first();
        if($blog == null)
        {
            $blog = BlogModel::where('id',$id)->first();
            if($blog == null)
            {
                return redirect()->route('index')->with(['msg'=>'Could not find blog!!','status'=>'error']);
            }
        }
        return view('blog.detail',compact(['page','blog']));
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
            $review = new Comment();
            $review->bai_viet_id = $request->id;
            $review->noi_dung = $request->message;
            $review->nguoi_dung_id = auth()->user()->id;
            $review->save();

            if($review)
            {
                return redirect()->back()->with(['msg'=>'Post comment success!!!','status'=>'success']);
            }
            return redirect()->back()->with(['msg'=>'Server error!','status'=>'error']);
        }
    }

    public function reply(Request $request,$id)
    {
        $request->validate([
            'reply_message'=>"required",
        ]);

        if(!$id)
        {
            return redirect()->back()->with(['msg'=>'Server error!!!','status'=>'error']);
        }else
        {
            $review = Comment::find($id);
            if(!$review)
            {
                return redirect()->back()->with(['msg'=>"No comment found!!!",'status'=>'error']);
            }

            $rep_review = new Comment();
            $rep_review->bai_viet_id = $review->bai_viet_id;
            $rep_review->tra_loi = $review->id;
            $rep_review->noi_dung = $request->reply_message;
            $rep_review->nguoi_dung_id = auth()->user()->id;
            $rep_review->save();

            if($rep_review)
            {
                return redirect()->back()->with(['msg'=>'Reply comment success!!!','status'=>'success']);
            }
            return redirect()->back()->with(['msg'=>'Server error!','status'=>'error']);
        }
    }
}
