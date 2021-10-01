<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $posts_query= Post::orderBy('created_at','desc')->paginate(3);
        $title = $request -> get('title');

        if(!empty($title)){
            $posts_query = Post::where('title', 'like', "%" . $title . "%")->get();
        }
        // $status = $request->get('status');
        // if($status !== null){
        //     $posts_query = Post::where('status', $status)->get();
        // }
        $posts = $posts_query;

        return view('backend.post.list') -> with([
            'posts' => $posts
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=DB::table('categories')->get();
        return view('backend.post.create')->with([
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only(['title','content','status','category_id']);
        // dd(1);
        // DB::table('posts')->insert([
        //     'tit'=>$data['title'],
        //     'slug'=> Str::slug($data['title']),
        //     'content'=>$data['content'],
        //     'user_created_id'=>1,
        //     'user_updated_id'=>1,
        //     'category_id'=>1,
        //     'created_at'=>now()
        // ]);

        // try{
        //     $insert = DB::table('posts')->insert([
        //         'title' => $data['title'],
        //         'slug' => Str::slug($data['title']),
        //         'content' => $data['content'],
        //         'user_created_id' => 1,
        //         'user_updated_id' => 1,
        //         'category_id'=>1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]); 
        // }catch(\Exception $ex){
        //     Log::error($ex->getMessage());
        // }

        $post=new Post();
        $post->title= $data['title'];
        // $post->slug= $data['title'];
        $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->user_updated_id = 1;
        $post->category_id=$data['category_id'];
        $post->content=$data['content'];
        $post->save();


        return redirect()->route('backend.posts.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=DB::table('posts')->find($id);
        return view('backend.post.show')->with([
            'post'=>$post
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
        $post=DB::table('posts')->find($id);
        $categories=DB::table('categories')->get();
        return view('backend.post.edit')->with([
            'post'=>$post,
            'categories'=>$categories,
            
            
        ]);

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
       $data=$request->only(['title','content','category_id','status']);

    //    DB::table('posts')->where('id',$id)
    //    ->update([
    //         'title'=>$data['title'],
    //         'content'=>$data['content'],
    //         'category_id'=>$data['category_id'],
    //         'status'=> $data['status']
    //    ]);

        $post = Post::find($id);
        $post->title= $data['title'];
        // $post->slug= $data['title'];
        $post->status=$data['status'];
        $post->user_created_id = 1;
        $post->user_updated_id = 1;
        $post->category_id=$data['category_id'];
        $post->content=$data['content'];
        $post->save();


       return redirect()->route('backend.posts.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('posts')->where('id',$id)->delete();
        $post =Post::find($id);
        $post->delete();
        return redirect()->route('backend.posts.list');
    }
}
