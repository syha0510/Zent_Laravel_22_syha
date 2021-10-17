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
    'prefix' => 'categories',
    'namespace'=> 'backend',
    'middleware' => ['auth','role:admin,admod'],
      
 ], function (){ 
    Route::get('/list', 'CategoryController@index')->name('backend.categories.list');
    
    Route::get('/create', 'CategoryController@create')->name('backend.categories.create');
    
    Route::post('/store','CategoryController@store')->name('backend.categories.store');
    
    Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.categories.edit');
    
    Route::post('/update/{id}', 'CategoryController@update')->name('backend.categories.update');
    
    Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('backend.categories.destroy');
    
    Route::get('/show/{id}', 'CategoryController@show')->name('backend.categories.show');

    Route::get('/restore/{id}', 'CategoryController@restore')->name('backend.categories.restore');

    Route::get('/delete', 'CategoryController@delete')->name('backend.categories.delete');
 });
 
// viewhome
Route::get('/', function () {
  
    return view('welcome');
})->name('home');


// Dashboard
Route::get('/backend/dashboard', 'backend\DashboardController@index')->middleware(['auth','role:admin,admod'])->name('backend.dashboard.index');

// user
Route::group([
    'prefix' => 'users',
    'namespace'=> 'backend',
    'middleware' => ['auth','role:admin,admod'],
 ], function (){ 
    Route::get('/list', 'UserController@index')->name('backend.users.list');
    
    Route::get('/create', 'UserController@create')->name('backend.users.create');
    
    Route::post('/store','UserController@store')->name('backend.users.store');
    
    Route::get('/edit/{id}', 'UserController@edit')->name('backend.users.edit');
    
    Route::post('/update/{id}', 'UserController@update')->name('backend.users.update');
    
    Route::delete('/destroy/{id}', 'UserController@destroy')->name('backend.users.destroy');

    Route::get('/show/{id}', 'UserController@show')->name('backend.users.show');

    Route::get('/restore/{id}', 'UserController@restore')->name('backend.users.restore');

    Route::get('/delete', 'UserController@delete')->name('backend.users.delete');

    Route::post('/login/user/{id}', 'UserController@loginWithUser')->name('backend.users.login');
    

 });

// post

Route::group([
    'prefix' => 'posts',
    'namespace'=> 'backend',
    'middleware' => ['auth','role:admin,admod'],
 ], function (){
    Route::get('/list', 'PostController@index')->name('backend.posts.list');
    
    Route::get('/create', 'PostController@create')->name('backend.posts.create');
    
    Route::post('/store', 'PostController@store')->name('backend.posts.store');
    
    Route::get('/edit/{id}', 'PostController@edit')->name('backend.posts.edit');
    
    Route::post('/update/{id}', 'PostController@update')->name('backend.posts.update');
    
    Route::delete('/delete/{id}', 'PostController@destroy')->name('backend.posts.delete');

    Route::get('/show/{id}', 'PostController@show')->name('backend.posts.show');
    
    Route::post('/updatestatus/{id}', 'PostController@updatestatus')->name('backend.posts.updatestatus');
 });

//  fontend
Route::group([
   'namespace'=> 'Frontend'
], function (){ 
   Route::get('/','HomeController@index')->name('frontend.home');
   
   Route::get('/post_category/{slug}','PostController@postbycategory')->name('frontend.post.post_category');
   
   Route::get('/list','PostController@index')->name('frontend.posts.index');

   Route::get('/show/{slug}','PostController@show')->name('frontend.posts.show');

   Route::get('/register','HomeController@register')->name('frontend.register');
});


Route::group([
   'prefix' => 'auth',
   'namespace'=> 'Auth',
   
], function (){
   
   Route::get('/register','RegisteredUserController@create')->name('auth.form-register');

   Route::post('/register','RegisteredUserController@store')->name('auth.register');

   Route::get('/login','LogInController@create')->name('auth.login');

   Route::post('/login','LogInController@authenticate')->name('authenticate.login');

   Route::post('/logout','LogInController@logout')->name('auth.logout')->middleware('auth');

  
   
});


Route::group([
   'prefix' => 'roles',
   'namespace'=> 'backend',
   'middleware' => ['auth'],
], function (){
   
   Route::get('/create','RoleController@create')->name('backend.roles.create');

   Route::post('/store', 'RoleController@store')->name('backend.roles.store');
  
   Route::get('/list','RoleController@index')->name('backend.roles.list');

   Route::get('/edit/{id}','RoleController@edit')->name('backend.roles.edit');

   Route::post('/update/{id}', 'RoleController@update')->name('backend.roles.update');

   Route::delete('/delete/{id}','RoleController@destroy')->name('backend.roles.destroy');

});

Route::group([
   'prefix' => 'permissions',
   'namespace'=> 'backend',
   'middleware' => ['auth'],
], function (){
   
   Route::get('/create','PermissionController@create')->name('backend.permissions.create');

   Route::post('/store', 'PermissionController@store')->name('backend.permissions.store');
  
   Route::get('/list','PermissionController@index')->name('backend.permissions.list');

   Route::get('/edit/{id}','PermissionController@edit')->name('backend.permissions.edit');

   Route::post('/update/{id}', 'PermissionController@update')->name('backend.permissions.update');

   Route::delete('/delete/{id}','PermissionController@destroy')->name('backend.permissions.destroy');
  

});

// Route::get('/mail',function(){
//        return view('backend.roles.create');
//    });