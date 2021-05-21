<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(){
        return view('admin.page.login');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        $isLogin = Auth::guard('users')->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ],$request->remember);
        if(!$isLogin)
        {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }else{
            if(Auth::guard('users')->user()->kichhoat == 1)
            {
                return redirect()->route('dashboard')->with(['msg'=>'Login success','status'=>'success']);
            }else{
                Auth::guard('users')->logout();
                return redirect()->back()->with([
                    'msg'=>'Your account has been locked please contact Super Admin for more details',
                    'status'=>'warning'
                ]);
            }
        }
    }

    public function logout(){
        Auth::guard('users')->logout();
        return redirect()->route('index')->with(['msg'=>'Logout success','status'=>'success']);
    }
}
