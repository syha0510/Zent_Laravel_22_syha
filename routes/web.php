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
Route::get('/backend/dashboard', 'backend\DashboardController@index')->name('backend.dashboard.index');

// user
Route::group([
    'prefix' => 'users',
    'namespace'=> 'backend'
 ], function (){ 
    Route::get('/list', 'UserController@index')->name('backend.users.list');
    
    Route::get('/create', 'UserController@create')->name('backend.users.create');
    
    Route::post('/store','UserController@store')->name('backend.users.store');
    
    Route::get('/edit/{id}', 'UserController@edit')->name('backend.users.edit');
    
    Route::post('/update/{id}', 'UserController@update')->name('backend.users.update');
    
    Route::delete('/delete/{id}', 'UserController@destroy')->name('backend.users.delete');
    
    

 });

// post

Route::group([
    'prefix' => 'posts',
    'namespace'=> 'backend'
 ], function (){
    Route::get('/list', 'PostController@index')->name('backend.posts.list');
    
    Route::get('/create', 'PostController@create')->name('backend.posts.create');
    
    Route::post('/store', 'PostController@store')->name('backend.posts.store');
    
    Route::get('/edit/{id}', 'PostController@edit')->name('backend.posts.edit');
    
    Route::post('/update/{id}', 'PostController@update')->name('backend.posts.update');
    
    Route::delete('/delete/{id}', 'PostController@destroy')->name('backend.posts.delete');
    
    
 });

