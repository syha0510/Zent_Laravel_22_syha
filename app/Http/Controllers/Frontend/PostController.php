<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postbycategory($slug)
    {
        $categories = Category::all();
        $postcates =Category::where('slug',$slug)->first();
   
        return view('frontend.posts.post_category')->with([
            'postcates'=>$postcates,
            'categories'=>$categories
        ]);
    }

    public function index()
    {
        $categories = Category::all();
        $newpost= Post::where('status',Post::STATUS_SHOW)->orderByDESC('created_at')->first();
        $posts= Post::where('status',Post::STATUS_SHOW)->orderByDESC('created_at')->whereNotIn('id',[$newpost->id])->paginate(4);
        return view('frontend.posts.index')->with([
            'posts'=>$posts,
            'newpost'=>$newpost,
            'categories'=>$categories
        ]);
    }

    public function show($slug)
    {
        $categories = Category::all();
        $post =Post::where('slug',$slug)->first();
        return view('frontend.posts.show')->with([
            'post'=>$post,
            'categories'=>$categories
        ]);
    }


}
