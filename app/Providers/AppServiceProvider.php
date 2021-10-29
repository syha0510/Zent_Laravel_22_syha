<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Cache::remember('categories', 60*60*60, function () {
            return Category::all();
        });

        View::share('categories',$categories);

        // $menus = Cache::remember('menus', 60*60*60, function () {
        //     return Menu::get();
        //     });
        //     View::share('menus', $menus);

        // $menus= Menu::get();
        // View::share('menus',$menus);
        Paginator::useBootstrap();
            
    }
}
