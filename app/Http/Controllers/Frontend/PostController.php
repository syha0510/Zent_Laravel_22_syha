<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function postbycategory($slug)
    {
        
        $postcates = Category::where('slug',$slug)->first();
        Cache::forget('categories');
        return view('frontend.posts.post_category')->with([
            'postcates'=> $postcates,
            
        ]);
    }

    public function index()
    {
       
        $newpost= Post::where('status',Post::STATUS_SHOW)->orderByDESC('created_at')->first();
        $posts= Post::where('status',Post::STATUS_SHOW)->orderByDESC('created_at')
        ->whereNotIn('id',[$newpost->id])->paginate(4);
        return view('frontend.posts.index')->with([
            'posts'=> $posts,
            'newpost'=> $newpost,
           
        ]);
    }

    public function show($slug)
    {
        
        $post =Post::where('slug',$slug)->first();
        return view('frontend.posts.show')->with([
            'post'=> $post,
            
        ]);
    }


}
