<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use App\Models\Guest;
use App\Models\GuestContact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $page = 'home';
        $products = Product::where('trangthai',1)->orderBy('created_at','desc')->limit(10)->get();
        $blog_list = BlogModel::orderBy('created_at','desc')->limit(10)->get();
        return view('page.index',compact(['page','products','blog_list']));
    }

    public function login(Request $request){
        $page = 'login';
        return view('auth.login',compact(['page']));
    }

    public function doLogin(Request $request){
        $page = 'login';

        $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

        $isLogin = Auth::guard('guests')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember);
        if(!$isLogin)
        {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }else{
            if(Auth::guard('guests')->user()->trangthai == 1)
            {
                return redirect()->route('index')->with(['msg'=>'Login success','status'=>'success']);
            }else{
                Auth::guard('guests')->logout();
                return redirect()->back()->with([
                    'msg'=>'Your account has been locked please contact customer service for more details',
                    'status'=>'warning'
                ]);
            }
        }
    }

    public function logout(){
        Auth::guard('guests')->logout();
        return redirect()->route('index')->with(['msg'=>'Logout success','status'=>'success']);
    }

    public function register(){
        $page = 'register';
        return view('auth.register',compact(['page']));
    }

    public function doRegister(Request $request){
        $request->validate([
            'email'=>['required','email','unique:khachhang,email'],
            'password'=>['required','confirmed','min:8'],
        ]);
        $khachhang = new Guest();
        $khachhang->email = $request->email;
        $khachhang->password = Hash::make($request->password);
        $khachhang->trang_thai = 1;
        $khachhang->save();
        if($khachhang)
        {
            $isLogin = Auth::guard('guests')->attempt(['email' => $request->email, 'password' => $request->password]);
            if($isLogin)
            {
                return redirect()->route('index')->with(['msg'=>'Register success!','status'=>'success']);
            }
        }else{
            return redirect()->route('register')->with(['msg'=>'Server error!','status'=>'error']);
        }

    }

    public function contact(){
        $page = 'contact';
        return view('page.contact',compact('page'));
    }

    public function profile(){
        $page = 'profile';
        return view('user.user-profile',compact(['page']));
    }

    public function updateProfile(Request $request){
        $request->validate([
            'ten'   => ['required','string'],
            'email' => ['required','email'],
            'sdt'   => ['required'],
        ]);
        $user = Guest::where('email',auth()->user()->email)->first();
        $user->ten = $request->ten;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        if($request->password != null)
        {
            $request->validate([
                'password'=>['confirmed','min:8']
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if($user)
        {
            Auth::guard('guests')->logout();
            $isLogin = Auth::guard('guests')->attempt(['email' => $request->email, 'password' => $request->password]);
            if($isLogin)
            {
                return redirect()->route('profile')->with(['msg'=>'Update information success!','status'=>'success']);
            }
        }else{
            return redirect()->route('profile')->with(['msg'=>'Server error!','status'=>'error']);
        }
    }

    public function about(){
        $page = 'about';
        return view('page.about',compact(['page']));
    }

    public function formForgotPassword()
    {
        $page = 'reset';
        return view('auth.forgot-password',compact(['page']));
    }

    public function sendMailForgotPass(Request $request){
        $reset_token = Str::upper(Str::random(30));
        $khachhang = Guest::where('email',$request->email)->first();
        if(!$khachhang)
        {
            $page = 'reset';
            $msg = 'Email khong chính xác';
            return view('auth.reset-password',compact(['page','email']));
        }
        $khachhang->reset_token = $reset_token;
        $khachhang->trangthai  = 3;
        $khachhang->save();

        $data = [
            'link'=>route('reset',$reset_token)
        ];
        // return view('reset',$data);
        Mail::send('reset', $data, function ($message) use($khachhang) {
            $message->to($khachhang->email, 'John Doe');
            $message->subject('Test mail');
        });

        return redirect()->route('index')->with(['msg'=>'Message has been sent to your email','status'=>'warning']);
    }

    public function resetPassword($token)
    {
        return view('auth.form-reset-password',['page'=>'reset','token'=>$token]);
    }

    public function doResetPassword(Request $request, $token)
    {
        $request->validate([
            'password'=>['required','confirmed','min:8'],
        ]);

        $user = Guest::where('reset_token',$token)->first();
        $user->password = Hash::make($request->password);
        $user->reset_token = null;
        $user->save();
        if($user)
        {
            return redirect()->route('login')->with(['page'=>'login','msg'=>'Reset Password success!','status'=>'success']);
        }else{
            return redirect()->route('forgot')->with(['page'=>'forgot','msg'=>'Server Error!','status'=>'error']);
        }
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'subject'=>'required',
            'message'=>'required',
        ]);

        $contact = new GuestContact();
        $contact->tieu_de = $request->subject;
        $contact->noi_dung = $request->message;
        $contact->nguoi_tao = auth()->user()->id;
        $contact->save();
        if($contact)
        {
            return redirect()->route('contact')->with(['msg'=>'Message has been sent!','status'=>'success']);
        }else{
            return redirect()->route('contact')->with(['msg'=>'Server Error!','status'=>'error']);
        }
    }

    public function search(Request $request)
    {
        $page = 'search';
        $search = $request->search;
        $products = Product::where('ten','like','%'.$search.'%')->get();
        $blogs = BlogModel::where('tieu_de','like','%'.$search.'%')->get();
        return view('page.search',compact(
            'page',
            'products',
            'blogs',
            'search'
        ));
    }
    public function _404()
    {
        $page = '404';
        return view('other.404',compact('page'));
    }
}
