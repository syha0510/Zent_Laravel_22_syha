<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $posts = Post::where('status',Post::STATUS_SHOW)->orderByDESC('created_at')->inRandomOrder()->limit(2)->get();
        $cate_products = Product::where('status',Product::STATUS_CONTINUE)->inRandomOrder()->limit(3)->get();
        $view_product = Product::orderByDESC('view')->limit(1)->get();
        return view('frontend.home')->with([
            'posts'=>$posts,
            'cate_products'=>$cate_products,
            'view_product'=>$view_product
        ]);
        
    }
    public function register()
    {
        return view('frontend.register');
    }

    
}
