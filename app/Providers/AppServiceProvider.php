<?php

namespace App\Providers;

use App\Http\Controllers\service\Cart;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new Cart,
                'categories' => Category::all()
            ]);
        });
    }
}
