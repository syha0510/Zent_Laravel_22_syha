<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function product()
    {
        return view('frontend.products.list');
    }

    

    // public function detail()
    // {
    //     return view('frontend.products.detail');
    // }
}
