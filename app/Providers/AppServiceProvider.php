<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\System\Jsonify;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('Jsonify', function($app) {
            return new Jsonify($app);
        });
    }
}
