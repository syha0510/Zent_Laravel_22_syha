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
   'prefix' => 'admin',
    'namespace'=> 'backend',
    'middleware' => ['auth','role:admin,admod','PreventBackHistory'],

],function(){

   // Dashboard
   Route::get('/', 'DashboardController@index')->middleware(['auth','role:admin,admod,writer','PreventBackHistory'])->name('backend.dashboard.index');

   // category
   Route::group([
      'prefix' => 'categories',
   ], function (){ 
      Route::get('/list', 'CategoryController@index')->name('backend.categories.list');
      
      Route::get('/create', 'CategoryController@create')->name('backend.categories.create');
      
      Route::post('/store','CategoryController@store')->name('backend.categories.store');
      
      Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.categories.edit');
      
      Route::post('/update/{id}', 'CategoryController@update')->name('backend.categories.update');
      
      Route::get('/destroy/{id}', 'CategoryController@destroy')->name('backend.categories.destroy');
      
      Route::get('/show/{id}', 'CategoryController@show')->name('backend.categories.show');
  
      Route::get('/restore/{id}', 'CategoryController@restore')->name('backend.categories.restore');
  
      Route::delete('/delete/{id}', 'CategoryController@delete')->name('backend.categories.delete');

      Route::get('/listdelete', 'CategoryController@listdelete')->name('backend.categories.listdelete');
   });
   
         // user
      Route::group([
         'prefix' => 'users',
      ], function (){ 
         Route::get('/list', 'UserController@index')->name('backend.users.list');
         
         Route::get('/create', 'UserController@create')->name('backend.users.create');
         
         Route::post('/store','UserController@store')->name('backend.users.store');
         
         Route::get('/edit/{id}', 'UserController@edit')->name('backend.users.edit');
         
         Route::post('/update/{id}', 'UserController@update')->name('backend.users.update');
         
         Route::get('/destroy/{id}', 'UserController@destroy')->name('backend.users.destroy');

         Route::get('/show/{id}', 'UserController@show')->name('backend.users.show');

         Route::get('/restore/{id}', 'UserController@restore')->name('backend.users.restore');

         Route::get('/listdelete', 'UserController@listdelete')->name('backend.users.listdelete');

         Route::post('/login/user/{id}', 'UserController@loginWithUser')->name('backend.users.login');
   
         Route::get('/lock/{id}', 'UserController@lock')->name('backend.users.lock');

         Route::get('/edit_profile/{id}', 'UserController@edit_profile')->name('backend.users.edit_profile');

         Route::post('/profile-avatar-update/{id}','usercontroller@profileupdateavatar')->name('backend.user.update-profile-avatar');

         Route::post('/update_profile/{id}', 'UserController@profileUpdate')->name('backend.users.profileUpdate');

         Route::delete('/delete/{user}', 'UserController@delete')->name('backend.users.delete');
      });

               // post
         Route::group([
            'prefix' => 'posts',
            'middleware' => ['auth','role:admin,admod,writer','PreventBackHistory'],
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

         // role
         Route::group([
            'prefix' => 'roles',
         ], function (){
            
            Route::get('/create','RoleController@create')->name('backend.roles.create');
         
            Route::post('/store', 'RoleController@store')->name('backend.roles.store');
           
            Route::get('/list','RoleController@index')->name('backend.roles.list');
         
            Route::get('/edit/{id}','RoleController@edit')->name('backend.roles.edit');
         
            Route::post('/update/{id}', 'RoleController@update')->name('backend.roles.update');
         
            Route::delete('/delete/{id}','RoleController@destroy')->name('backend.roles.destroy');
         
         });

         // permisson
         Route::group([
            'prefix' => 'permissions',
         ], function (){
            
            Route::get('/create','PermissionController@create')->name('backend.permissions.create');
         
            Route::post('/store', 'PermissionController@store')->name('backend.permissions.store');
           
            Route::get('/list','PermissionController@index')->name('backend.permissions.list');
         
            Route::get('/edit/{id}','PermissionController@edit')->name('backend.permissions.edit');
         
            Route::post('/update/{id}', 'PermissionController@update')->name('backend.permissions.update');
         
            Route::delete('/delete/{id}','PermissionController@destroy')->name('backend.permissions.destroy');
           
         
         });
         
         // tag
         Route::group([
            'prefix' => 'tags',
         ], function (){
            
            Route::get('/create','TagController@create')->name('backend.tags.create');
         
            Route::post('/store', 'TagController@store')->name('backend.tags.store');
           
            Route::get('/list','TagController@index')->name('backend.tags.list');
         
            Route::get('/edit/{id}','TagController@edit')->name('backend.tags.edit');
         
            Route::post('/update/{id}', 'TagController@update')->name('backend.tags.update');
         
            Route::delete('/delete/{id}','TagController@destroy')->name('backend.tags.destroy');
            
         
         });

         //categoryproduct

         Route::group([
            'prefix' => 'categoryproducts',
         ], function (){ 
            Route::get('/list', 'CategoryProductController@index')->name('backend.categoryproducts.list');
            
            Route::get('/create', 'CategoryProductController@create')->name('backend.categoryproducts.create');
            
            Route::post('/store','CategoryProductController@store')->name('backend.categoryproducts.store');
            
            Route::get('/edit/{id}', 'CategoryProductController@edit')->name('backend.categoryproducts.edit');
            
            Route::post('/update/{id}', 'CategoryProductController@update')->name('backend.categoryproducts.update');
            
            Route::delete('/destroy/{id}', 'CategoryProductController@destroy')->name('backend.categoryproducts.destroy');
            
            Route::get('/show/{id}', 'CategoryProductController@show')->name('backend.categoryproducts.show');
        
            Route::get('/restore/{id}', 'CategoryProductController@restore')->name('backend.categoryproducts.restore');
        
            Route::get('/delete', 'CategoryProductController@delete')->name('backend.categoryproducts.delete');
         });

         // product

         Route::group([
            'prefix' => 'products',
         ], function (){
            
            Route::get('/create','ProductController@create')->name('backend.products.create');
         
            Route::post('/store', 'ProductController@store')->name('backend.products.store');
           
            Route::get('/list','ProductController@index')->name('backend.products.list');
         
            Route::get('/edit/{id}','ProductController@edit')->name('backend.products.edit');
         
            Route::post('/update/{id}', 'ProductController@update')->name('backend.products.update');
         
            Route::delete('/delete/{product}','ProductController@destroy')->name('backend.products.destroy');
            
            Route::post('/show','ProductController@show')->name('backend.products.show');

            Route::get('/filter','ProductController@filterProduct')->name('backend.products.filter');

            Route::get('/search','ProductController@search')->name('backend.products.search');

            Route::post('/autocomplete-ajax','Product@autocomplete_ajax')->name('backend.products.searchauto');
         });

         // brand

         Route::group([
            'prefix' => 'brands',
         ], function (){
            
            Route::get('/create','BrandController@create')->name('backend.brands.create');
         
            Route::post('/store', 'BrandController@store')->name('backend.brands.store');
           
            Route::get('/list','BrandController@index')->name('backend.brands.list');
         
            Route::get('/edit/{id}','BrandController@edit')->name('backend.brands.edit');
         
            Route::post('/update/{id}', 'BrandController@update')->name('backend.brands.update');
         
            Route::delete('/delete/{id}','BrandController@destroy')->name('backend.brands.destroy');
            
         
         });

         Route::group([
            'prefix' => 'orders',
         ], function (){
            Route::get('/list','OrderController@index')->name('backend.orders.list');
      
            Route::get('/show/{id}','OrderController@show')->name('backend.orders.show');

            Route::post('/update/{id}','OrderController@update')->name('backend.orders.update');

            Route::delete('/destroy/{order}','OrderController@delete')->name('backend.orders.destroy');
         });

});



// // viewhome
// Route::get('/', function () {
  
//     return view('welcome');
// })->name('home');







//  fontend
Route::group([
   'prefix' => '/',
   'namespace'=> 'Frontend'
], function (){ 
   Route::get('/','HomeController@index')->name('frontend.home');
   
   Route::get('/post_category/{slug}','PostController@postbycategory')->name('frontend.post.post_category');
   
   Route::get('/list','PostController@index')->name('frontend.posts.index');

   Route::get('/show/{slug}','PostController@show')->name('frontend.posts.show');

   Route::get('/register','HomeController@register')->name('frontend.register');

   Route::get('/product','ProductController@getCategory')->name('frontend.products.list');

   Route::get('/detail/{id}','ProductController@detailProduct')->name('frontend.products.detail');

   ;


   Route::group([
      'prefix' => 'carts',
   ], function (){
      Route::get('/index','CartController@index')->name('frontend.carts.index');

      Route::get('/add/{id}','CartController@add')->name('frontend.carts.add');

      Route::get('/update','CartController@update')->name('frontend.carts.update');

      Route::get('/remove/{id}','CartController@remove')->name('frontend.carts.remove');

      Route::get('/destroy','CartController@destroy')->name('frontend.carts.destroy');

      Route::get('/checkout','CartController@checkout')->name('frontend.carts.checkout');

      Route::post('/pay','CartController@pay')->name('frontend.carts.pay');
   
   });

   

   
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






// Route::get('/product',function(){
//        return view('frontend.product.list');
//    });