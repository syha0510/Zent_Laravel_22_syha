<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

        
        $users_query= User::orderBy('created_at','desc')->paginate(4);
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
    public function listdelete( Request $request)
    {
        $userdelete=User::onlyTrashed()->get();
        return view('backend.user.listdelete')->with([
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
        $roles = Role::whereNotIn('id',[1])->get();
        return view('backend.user.create')->with([
            'roles'=>$roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {

        $data=$request->only(['name','password','status','email']);
        $user=new user();

        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $user->disk = $disk;
            $user->image = $path;
        }

        

        $user->name= $data['name'];
        $user->password= bcrypt($request->password);
        // $user->address= $data['address'];
        // $user->phone= $data['phone'];
        $user->status= 1;
        $user->email= $data['email'];
        // dd($user);
        $user->save();

        $user_info=new Userinfo();
        $user_info->user_id=$user->id;
        $user_info->save();
        $user->roles()->attach($request->roles);
        
        DB::commit();
            Session::flash('success', 'Thêm mới thành công!');
            return redirect()->route('backend.users.list');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm mới thất bại!');
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        // $userInfo= $user->userInfo;
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
        DB::beginTransaction();
        try {

        $data=$request->only(['name','password','status','email','address','phone']);
        $user= User::find($id);

        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $user->disk = $disk;
            $user->image = $path;
        }

        
        if($request->get('password') == null){
            $user->password  =  $user->password;
        }else{
            $user->password = bcrypt($request->get('password'));
        }
        $user->name= $data['name'];
        
        $user->address= $data['address'];
        $user->phone= $data['phone'];
        $user->status= 1;
        $user->email= $data['email'];
        // dd($user);
        $user->save();

        $user_info=new Userinfo();
        $user_info->user_id=$user->id;
        $user_info->save();
        $user->roles()->attach($request->roles);
        
        DB::commit();
            Session::flash('success', 'Chỉnh sửa thành công!');
            return redirect()->route('backend.users.list');
        } catch (\Exception $e) {
            Session::flash('error', 'Chỉnh sửa thất bại!');
            DB::rollBack();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if(! Gate::allows('delete-user',$user)){
            abort(403);
        }
        // DB::table('users')->where('id',$id)->delete();
        $user = User::withTrashed()->where('id', $id)->forceDelete();
        $user_info=Userinfo::where('user_id',$id)->delete();
    
        return redirect()->route('backend.users.listdelete');
    }

    public function delete(User $user)
    {
        $user_info=Userinfo::where('user_id',$user->id)->delete();
        $user->delete();
 
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

    public function lock($id)
    {
        $user = User::find($id);
        if ($user->status == 0)
        {
            $user->status =1;

        }
        else{
            $user->status=0;
        }

        $user->save();
        return redirect()->route('backend.users.list');
    }
    
    public function edit_profile($id)
    {
        $user=User::find($id);
        return view('backend.user.edit_profile')->with([
            'user'=>$user,
        ]);
    }

    public function profileUpdateAvatar(Request $request,$id)
    {   
        $user = User::find($id);

        $data = $request->except('_token');


        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $user->disk = $disk;
            $user->image = $path;
        }


        $user->save();

        return back()->with('success','Cập nhật thành công');
    }

    public function profileUpdate(Request $request, $id)
    {
        $user = User::find($id);

        $data = $request->except('_token');

        $user->phone = $request->get('phone');
        $user->name = $request->get('name');
        $user->address = $request->get('address');
        $user->update($data);
        return back()->with('success','Cập nhật thành công');
    }
}
