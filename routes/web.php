<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


// Dashboard
Route::get('/backend/dashboard', function () {
    return view('backend.dashboard');
})->name('backend.dashboard.index');

// user
Route::group([
    'prefix' => 'users'
 ], function (){ 
    Route::get('/list', function () {
        return view('backend.user.list');
    
    })->name('backend.users.list');
    
    Route::get('/create', function () {
        return view('backend.user.create');
    
    })->name('backend.users.create');
    
    Route::post('/store', function () {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.users.store');
    
    Route::get('/edit/{id}', function ($id) {
        return view('backend.user.edit');
    })->name('backend.users.edit');
    
    Route::post('/update/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.users.update');
    
    Route::delete('/delete/{id}', function ($id) {
        return redirect()->route('backend.dashboard.index');
    })->name('backend.users.delete');
    
    

 });

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

