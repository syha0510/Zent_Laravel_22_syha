<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\backend\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

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
            $posts_query = Post::where('title', 'like', "%" . $title . "%")->paginate(1);
        }
        // $status = $request->get('status');
        // if($status !== null){
        //     $posts_query = Post::where('status', $status)->get();
        // }
        $posts = $posts_query;

        // $posts = Post::where('status','=', Post::STATUS_SHOW)->paginate(3);
        $posts=Post::paginate(20);
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
        // $tags=Tag::get();
        $categories=DB::table('categories')->get();
        return view('backend.post.create')->with([
            'categories'=>$categories,
            // 'tags'=> $tags
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
        // if($request->user()->cannot('create',Post::class))
        // {
        //     abort(403);
        // }


        
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

        // $validated= $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'content' => 'required',

        // ]);

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'image' => 'required|file|mimes:png,jpg'
        ],
        [
            'required' => 'Thuộc tính :attribute cần phải có',
            'image.required' => 'Vui lòng chọn :attribute ',
        ],
        [
            'title' => 'tiêu đề',
            'content' => 'nội dung',
            'image' => 'ảnh'
        ]
    );

        if ($validator->fails()) {
            return redirect('posts/create')
            ->withErrors($validator)
            ->withInput();
            }
            


        $data=$request->only(['title','content','status','category_id','user_id']);

        $post=new Post();

        if($request->hasFile('image'))
        {
            $disk = 'public';
            $path = $request->file('image')->store('blogs', $disk);
            $post->disk = $disk;
            $post->image = $path;
        }

        $post->title= $data['title'];
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        $post->user_created_id = Auth::user()->id;
        $post->user_updated_id = Auth::user()->id;
        $post->category_id=$data['category_id'];
        $post->content=$data['content'];
        $post->user_id =Auth::user()->id;
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
    public function update(UpdatePostRequest $request, $id)
    {
       $data=$request->only(['title','content','category_id','status']);

    //    DB::table('posts')->where('id',$id)
    //    ->update([
    //         'title'=>$data['title'],
    //         'content'=>$data['content'],
    //         'category_id'=>$data['category_id'],
    //         'status'=> $data['status']
    //    ]);

    // $validated= $request->validate([
    //     'title' => 'required|unique:posts|max:255',
    //     'content' => 'required',

    // ]);

        
        
        

        $post = Post::find($id);

        // if(! Gate::allows('update-post',$post)){
        //     abort(403);
        // }

        if($request->user()->cannot('update',$post)){
            abort(403);
        }

       
            

        $post->title= $data['title'];
        // $post->slug= $data['title'];
        // $post->status=$data['status'];
        // $post->user_id = 1;
        $post->user_created_id = Auth::user()->id;
        $post->user_updated_id = Auth::user()->id;
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
        $post = Post::find($id);

        if (Auth::user()->cannot('delete-post')){
            return abort(403);
        }

        // if(! Gate::allows('delete-post',$post)){
        //     abort(403);
        // }

        $post->delete();
        return redirect()->route('backend.posts.list');
    }

    public function updatestatus($id)
    {
        $post = Post::find($id);
        
        if($post->status==1){
            $post->status = 0;
        }
        else{
            $post->status = 1;
        }
        $post->save();
        return redirect()->route('backend.posts.list');
    }
}
