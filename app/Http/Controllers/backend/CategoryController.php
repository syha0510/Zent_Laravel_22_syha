<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=DB::table('categories')->paginate(3);
        return view('backend.category.list')->with([
            'categories'=>$categories
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated= $request->validate([
            'name' => 'required|unique:posts|max:255',
        ]);

        $data=$request->only(['name']);

        // DB::table('categories')->insert([
        //     'name'=>$data['name'],
        //     'created_at'=>now()
        // ]);
        
        $category=new Category();
        $category->name= $data['name'];
        $category->save();
        $request->session()->flash('success', 'Thêm mới thành công');
        return redirect()->route('backend.categories.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=DB::table('categories')->find($id);
        return view('backend.category.show')->with([
            'category'=>$category
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
        $category=DB::table('categories')->find($id);
        return view('backend.category.edit')->with([
            'category'=>$category
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

        $validated= $request->validate([
            'name' => 'required|max:255',
    
        ]);
        
        $data=$request->only(['name']);

    //    DB::table('categories')->where('id',$id)
    //    ->update([
    //         'name'=>$data['name']
    //    ]);

        $category= Category::find($id);
        $category->name= $data['name'];
        $category->save();
        Cache::forget('categories');
        $request->session()->flash('success', 'Cập nhật thành công');
       return redirect()->route('backend.categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('backend.categories.list');
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id',$id)->restore();

        return redirect()->route('backend.categories.list');
    }

    public function delete( Request $request)
    {
        $categorydelete=Category::onlyTrashed()->get();
        return view('backend.category.delete')->with([
            'categorydelete'=>$categorydelete
        ]);
    }

}
