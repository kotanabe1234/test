<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PracticeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('practice', function () {
            $result = 'ゴンザレス';
            $result = 'お疲れ様でした';
            return $result;
        });
    }
}
