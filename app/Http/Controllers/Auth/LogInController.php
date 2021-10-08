<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate( Request $request)
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
            $request->session()->regenerate();
            return redirect()->intended('backend/dashboard');
        }

       
        return back()->withErrors([
            'email' => 'Lỗi đăng nhập'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')-> logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

   
}
