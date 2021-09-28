<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        // $users=DB::table('users')->get();
        // return view('backend.user.list')->with([
        //     'users'=>$users
        // ]);

        $users_query= DB::table('users');
        $name = $request -> get('name');
        // dd($title);
        if(!empty($name)) 
        {
            $users_query -> where('name', 'like', "%" . $name . "%");
        }
        $email = $request -> get('email');
        if($email !== null){
            $users_query -> where('email', $email);
        }
        $users = $users_query -> get();

        return view('backend.user.list') -> with([
            'users'=>$users
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=array();
        $user['name']=$request->get('name');
        $user['email']=$request->get('email');
        $user['passwword']=$request->get('password');
        dd($user);
        return redirect()->route('backend.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=DB::table('users')->find($id);
        return view('backend.user.show')->with([
            'user'=>$user
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=DB::table('users')->find($id);
        return view('backend.user.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->only(['name']);

       DB::table('users')->where('id',$id)
       ->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address']
       ]);
       return redirect()->route('backend.users.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('backend.users.list');
    }
}
