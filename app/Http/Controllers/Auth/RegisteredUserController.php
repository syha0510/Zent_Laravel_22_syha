<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest  $request)
    {
        // $request->validate([
        //     'name' => ['required','string','max:255' ],
        //     'email' => [ 'required','string','email', 'max:255','unique:users' ],
        //     'password' => [ 'required','confirmed', Rules\Password::defaults() ]
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user)
        {
            $user_id = User::all()->last();
            $user_info = Userinfo::create([
                'user_id' => $user_id->id,
            ]);
        }
        return redirect('backend/dashboard');
    }
}
