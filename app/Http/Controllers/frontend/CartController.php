<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $page = 'cart';
        return view('product.cart',compact('page'));
    }
    public function addToCart($id){
        //Cấp giỏ hàng
        $cart = session('cart');
        //Kiểm tra dữ liệu
        $product = Product::where([
        'id'=>$id,
        'trangthai'=>1
        ])->where('soluong','>',0)->first();
        if($product== null)
        {
            $page = 'product';
            return redirect()->route('product.shop')->with(['msg'=>'Sản phẩm không tồn tại','status'=>'danger']);
        }
        //Kiểm tra sả phẩm có trong giỏ hàng chưa
        $sl = 1;
        if(isset($cart[$id]))
        {
            //Có sản phẩm trong giỏ hàng + sl
            $sl = ($cart[$id]['qty'] + 1);
        }
        // Kiểm tra số lượng sản phẩm có còn đủ không
        if($product->soluong>$sl)
        {
            //Số lượng đủ Thêm sản pẩm vào giỏ
            $cart[$id] = [
                'id' => $id,
                'name' => $product->ten,
                'slug' => $product->slug,
                'img' => $product->hinhdaidien,
                'price' => $product->gia,
                'stock' => $product->soluong,
                'qty' => $sl,
            ];
            session(['cart'=>$cart]);
            return redirect()->route('product.shop')->with(['msg'=>'Thêm thành công!','status'=>'success']);
        }else{
            //Trả về trang chủ
            return redirect()->route('product.shop')->with(['msg'=>'Số lượng sản phẩm còn lại không đủ','status'=>'danger']);
        }
    }

    public function checkOut(){
        $page = 'checkout';
        if(session('cart') == null)
        {
            $page = 'product';
            return redirect()->route('cart');
        }
        return view('product.checkout',compact(['page']));
    }

    public function doCheckOut(Request $request){

        $page = 'complete';
        // dd($request);
        if(!session('cart')){
            return redirect()->route('product.shop')->with(['msg'=>"No orders yet!",'status'=>'warning']);
        }
        $donhang = new Order();
        $donhang->ngaydat = Carbon::now()->timezone('Asia/Ho_Chi_Minh');
        $donhang->makhachhang = auth()->user()->id;
        $donhang->tongtien = session('subTotal');
        $donhang->trangthaidonhang = 1;
        $donhang->trangthai = 1;
        $donhang->dia_chi_giao_hang = $request->address2.', '.$request->address1.', '.$request->city.', '.$request->state.', '.$request->country;
        $donhang->luu_y = $request->orderNotes;

        session(['donhang'=>$donhang]);
        $donhang->save();

        $sodonhang = Order::find($donhang->id);
        $sodonhang->sodonhang = 'HD00'.$donhang->id;
        session(['sodonhang'=>$sodonhang->sodonhang]);
        $sodonhang->save();

        foreach(session('cart') as $sp)
        {
            $chiTietDon = new OrderDetail();
            $chiTietDon->madonhang = $donhang->id;
            $chiTietDon->masanpham = $sp['id'];
            $chiTietDon->soluong = $sp['qty'];
            $chiTietDon->gia = $sp['price'];
            $chiTietDon->trangthai = 1;
            $chiTietDon->save();
        }
        Mail::send('mail', [], function ($message) {
            $message->to(auth()->user()->email, 'John Doe');
            $message->subject('Order complete');
        });
        $khachHang = auth()->user();
        return view('product.oder-complete',compact(['page','khachHang']));
    }

    public function updateCart(Request $request){
        $cart = session('cart');
        $errs ='';
        foreach($request->quatity as $index=>$value)
        {
            if($cart[$index]['stock']>$value)
                $cart[$index]['qty'] = $value;
            else
                $errs .=$cart[$index]['qty'].' Không đủ số lượng!';
        }
        session(['cart'=> $cart]);
        return redirect()->route('cart');
    }

    public function addToCartAjax(Request $request)
    {
        //Cấp giỏ hàng
        $id = $request->id;
        $cart = session('cart');
        //Kiểm tra dữ liệu
        $product = Product::where([
        'id'       => $id,
        'trangthai'=> 1
        ])->where('soluong','>',0)->first();
        if($product== null)
        {
            $page = 'product';
            return response()->json([
                'msg'=>'Sản phẩm không tồn tại',
                'status'=>'error'
            ]);
        }
        //Kiểm tra sả phẩm có trong giỏ hàng chưa
        $sl = 1;
        if(isset($cart[$id]))
        {
            //Có sản phẩm trong giỏ hàng + sl
            $sl = ($cart[$id]['qty'] + 1);
        }
        // Kiểm tra số lượng sản phẩm có còn đủ không
        if($product->soluong>$sl)
        {
            //Số lượng đủ Thêm sản pẩm vào giỏ
            $cart[$id] = [
                'id' => $id,
                'name' => $product->ten,
                'slug' => $product->slug,
                'img' => $product->hinhdaidien,
                'price' => $product->gia,
                'stock' => $product->soluong,
                'qty' => $sl,
            ];
            session(['cart'=>$cart]);
            $minicart = view('widget.minicart')->render();
            return response()->json([
                'msg'       =>'Thêm thành công',
                'status'    =>'success',
                'minicart'  =>$minicart
            ]);
        }else{
            //Trả về trang chủ
            return response()->json([
                'msg'=>'Số lượng sản phẩm còn lại không đủ',
                'status'=>'danger'
            ]);
        }
    }

    public function deleteFormCart(Request $request)
    {
        //Cấp giỏ hàng
        $id = $request->id;
        //Kiểm tra dữ liệu
        if(array_key_exists($id,session('cart')))
        {
            $arr = Arr::except(session('cart'),$id);
            session(['cart'=>$arr]);
            $minicart = view('widget.minicart')->render();
            return response()->json([
                'msg'       =>'Xóa khỏi giỏ hàng thành công',
                'status'    =>'success',
                'minicart'  =>$minicart
            ]);
        }else{
            return response()->json([
                'msg'=>'Không tìm thấy sản phẩm!',
                'status'=>'error',
            ]);
        }
    }
}
