<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory()
    {
        $products = Product::orderBy('created_at','desc')->paginate(6);
        
        $feature_products = Product::take(5)->get();
        $category_products = CategoryProduct::orderBy('created_at','desc')->get();
        return view('frontend.products.list')->with([
            'products' => $products,
            'feature_products' => $feature_products,
            'category_products' => $category_products,
        ]);
   
    }

    public function detailProduct($id)
    {
        $detail_product =Product::find($id);
        return view('frontend.products.detail')->with([
            'detail_product' => $detail_product,
        ]);
    }

    public function pay()
    {
        return view('frontend.products.pay');
    }
}
