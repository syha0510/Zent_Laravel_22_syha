<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postbycategory()
    {
        return view('frontend.posts.post_category');
    }

    public function index()
    {
        return view('frontend.posts.index');
    }

    public function show()
    {
        return view('frontend.posts.show');
    }
}
