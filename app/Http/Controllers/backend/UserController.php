<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        
        $users_query= User::orderBy('created_at','desc')->paginate(3);
        $name = $request -> get('name');
   
        if(!empty($name)) 
        {
            $users_query =User::where('name', 'like', "%" . $name . "%")->paginate(1);
        }
        $email = $request -> get('email');
        if($email !== null){
            $users_query=User:: where('email', $email)->paginate(1);
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
        $data=$request->only(['name','password','status','email']);
        $user=new user();
        $user->name= $data['name'];
        $user->password= $data['password'];
        // $user->address= $data['address'];
        // $user->phone= $data['phone'];
        $user->status= $data['status'];
        $user->email= $data['email'];
        // dd($user);
        $user->save();

        $user_info=new Userinfo();
        $user_info->user_id=$user->id;
        $user_info->save();
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
        // $user=User::find($id);
        // $userInfo= $user->userInfo;
        $posts = User::find($id)->posts;

        $userInfo = Userinfo::where('phone','087979765')->first();
        $user =$userInfo->user;
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

    public function loginWithUser($id)
    {
        Auth::loginUsingId($id);

        return redirect()->route('backend.dashboard.index');
    }
    
}
