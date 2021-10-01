<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        // $users_query= DB::table('users');

        
        $users_query= User::orderBy('created_at','desc')->paginate(1);
        $name = $request -> get('name');
   
        if(!empty($name)) 
        {
            $users_query =User::where('name', 'like', "%" . $name . "%")->get();
        }
        $email = $request -> get('email');
        if($email !== null){
            $users_query=User:: where('email', $email)->get();
        }
        $users = $users_query;

        return view('backend.user.list') -> with([
            'users'=>$users,
            
        ]);
        
    }
    public function delete( Request $request)
    {
        $userdelete=User::onlyTrashed()->get();
        return view('backend.user.delete')->with([
            'userdelete'=>$userdelete
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
        $data=$request->only(['name','email','phone','address']);

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
        // DB::table('users')->where('id',$id)->delete();
        User::destroy($id);
        return redirect()->route('backend.users.list');
    }

    public function restore($id)
    {
        User::withTrashed()->where('id',$id)->restore();

        return redirect()->route('backend.users.list');
    }
    
}
