<?php

namespace Dokohler\Imgplay;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
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
        //
        $this->app->bind('register-imgplay', function($name, $images = [], $options = []) {
            return new Player($name, $images, $options);
        });
    }
}
