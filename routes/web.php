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

Route::get('/', function () {
  
    return view('welcome');
})->name('home');
Route::get('/backend/dashboard', function () {
    return view('category.dashboard');
})->name('backend.dashboard.index');

Route::get('/backend/categories/list', function () {
    return view('category.list');

})->name('backend.categories.list');

Route::get('/backend/categories/create', function () {
    return view('category.create');

})->name('backend.categories.create');

Route::post('/backend/categories/store', function () {
    return redirect()->route('backend.dashboard.index');
})->name('backend.categories.store');

Route::get('/backend/categories/edit/{id}', function ($id) {
    return view('category.edit');
})->name('backend.categories.edit');

Route::post('/backend/categories/update/{id}', function ($id) {
    return redirect()->route('backend.dashboard.index');
})->name('backend.categories.update');

Route::delete('/backend/categories/delete/{id}', function ($id) {
    return redirect()->route('backend.dashboard.index');
})->name('backend.categories.delete');

Route::get('/backend/categories/show/{id}', function ($id) {
    return view('category.show');
})->name('backend.categories.show');


// post

Route::get('/backend/dashboard', function () {
    return view('category.dashboard');
})->name('backend.dashboard.index');

Route::get('/backend/posts/list', function () {
    return view('post.list');

})->name('backend.posts.list');

Route::get('/backend/posts/create', function () {
    return view('post.create');

})->name('backend.posts.create');

Route::post('/backend/posts/store', function () {
    return redirect()->route('backend.dashboard.index');
})->name('backend.posts.store');

Route::get('/backend/posts/edit/{id}', function ($id) {
    return view('post.edit');
})->name('backend.posts.edit');

Route::post('/backend/posts/update/{id}', function ($id) {
    return redirect()->route('backend.dashboard.index');
})->name('backend.posts.update');

Route::delete('/backend/posts/delete/{id}', function ($id) {
    return redirect()->route('backend.dashboard.index');
})->name('backend.posts.delete');

Route::get('/backend/posts/show/{id}', function ($id) {
    return view('category.show');
})->name('backend.posts.show');





