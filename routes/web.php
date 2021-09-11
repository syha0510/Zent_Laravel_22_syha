<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
    'prefix' => 'categories'
 ], function (){
    Route::get('/list', function () {
        return view('category.list');
    
    })->name('backend.categories.list');
    
    Route::get('/create', function () {
        return view('category.create');
    
    })->name('backend.categories.create');
    
    Route::post('/store', function () {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.categories.store');
    
    Route::get('/edit/{id}', function ($id) {
        return view('category.edit');
    })->name('backend.categories.edit');
    
    Route::post('/update/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.categories.update');
    
    Route::delete('/delete/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.categories.delete');
    
    Route::get('/show/{id}', function ($id) {
        return view('category.show');
    })->name('backend.categories.show');
    
 });
Route::get('/', function () {
  
    return view('welcome');
})->name('home');
Route::get('/backend/dashboard', function () {
    return view('category.dashboard');
})->name('backend.dashboard.index');



// post
Route::group([
    'prefix' => 'posts'
 ], function (){
    Route::get('/list', function () {
        return view('post.list');
    
    })->name('backend.posts.list');
    
    Route::get('/create', function () {
        return view('post.create');
    
    })->name('backend.posts.create');
    
    Route::post('/store', function () {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.posts.store');
    
    Route::get('/edit/{id}', function ($id) {
        return view('post.edit');
    })->name('backend.posts.edit');
    
    Route::post('/update/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.posts.update');
    
    Route::delete('/delete/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.posts.delete');
    
    Route::get('/show/{id}', function ($id) {
        return view('category.show');
    })->name('backend.posts.show');
    
 });






