<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
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
        $posts_query= DB::table('posts');
        $title = $request -> get('title');
        // dd($title);
        if(!empty($title)){
            $posts_query -> where('title', 'like', "%" . $title . "%");
        }
        $status = $request -> get('status');
        if($status !== null){
            $posts_query -> where('status', $status);
        }
        $posts = $posts_query -> get();

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
        $data=$request->only(['title','content']);
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

        try{
            $insert = DB::table('posts')->insert([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['content'],
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ]); 
        }catch(\Exception $ex){
            Log::error($ex->getMessage());
        }

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
            'content'=>  $post->content,
            'title' => $post->title,
            'categories'=>$categories,
            'id'=>$post->id
            
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
       $data=$request->only(['title','content','category_id']);

       DB::table('posts')->where('id',$id)
       ->update([
            'title'=>$data['title'],
            'content'=>$data['content'],
            'category_id'=>$data['category_id']
       ]);
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
        DB::table('posts')->where('id',$id)->delete();
        return redirect()->route('backend.posts.list');
    }
}
