<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\System\Jsonify;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (config('app.log_level') == 'debug') {

            // sql检测
            \DB::listen(
                function ($db) {
                    foreach ($db->bindings as $i => $binding) {
                        if ($binding instanceof \DateTime) {
                            $db->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                        } else {
                            if (is_string($binding)) {
                                $db->bindings[$i] = "'$binding'";
                            }
                        }
                    }
                    $query = str_replace(array('%', '?'), array('%%', '%s'), $db->sql);
                    $query = vsprintf($query, $db->bindings);
                    $args = implode(' | ', $db->bindings);
                    Log::debug(" # sql:{$query} # time:{$db->time} # binds:{$args}");
                }
            );
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('Jsonify', function ($app) {
            return new Jsonify($app);
        });
    }
}
