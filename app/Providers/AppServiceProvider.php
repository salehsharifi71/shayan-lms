<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        //
        if(request()->server->get('HTTP_HOST')=='127.0.0.1:8000'||request()->server->get('HTTP_HOST')=='salehman.shayanlms.com:8000'){

        }else {
            URL::forceScheme('https');
        }
    }
}
