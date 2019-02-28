<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Library\Services\CartOne;
use App\Library\Services\CartTwo;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Contracts\CartServiceInterface', function($app) {
            return new CartTwo();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
