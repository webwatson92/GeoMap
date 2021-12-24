<?php

namespace App\Providers;

use App\Http\ViewComposers\HomeComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Blade;use View;

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
       Paginator::useBootstrap();

       Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        });

       View::composer([
                        'back.index', 'back.societale.index', 'back.societale.map', 
                        'partials.layouts', 
                        'partials.layouts_magso', 'partials.plant'
                      ], HomeComposer::class);

        $this->app->bind('path', function() {
            return base_path().'/../public_html';
        }); 
    }
}
