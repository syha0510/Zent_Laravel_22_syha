<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogInController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate( LoginRequest $request)
    {
        // dd($request->all());
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        if($request->get('remember'))
        {
            $remember = true;
        } 
        else
        {
            $remember = false;
        }



        if( Auth::attempt($credential ,$remember))
        {
            if( Auth::user()->status ==0 )
            {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Tài khoản đã bị khóa'
                ]);
            }
            $request->session()->regenerate();
            Cookie::queue('email', $request->get('email'));
            return redirect()->intended('/admin');
            
        }

        

        return back()->withErrors([
            'email' => 'Lỗi đăng nhập'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

   
}
