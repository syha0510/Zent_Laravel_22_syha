<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
    public function getCategory(Request $request)
    {
        $products = Product::orderBy('created_at','desc')->paginate(3);
        if(isset($request->number_item))
        {
            // dd($request->number_item);
            $products = Product::orderBy('created_at','desc')->paginate($request->number_item);
        }
        
        
        $brands = Brand::orderBy('created_at','desc')->get();
        $feature_products = Product::take(5)->get();
        $category_products = CategoryProduct::orderBy('created_at','desc')->get();
        return view('frontend.products.list')->with([
            'products' => $products,
            'feature_products' => $feature_products,
            'category_products' => $category_products,
            'brands' =>$brands
        ]);
   
    }

    public function detailProduct($id)
    {
        $detail_product =Product::find($id);
        $detail_product->view+=1;
        $detail_product->save();
        return view('frontend.products.detail')->with([
            'detail_product' => $detail_product,
        ]);
    }

    
}
