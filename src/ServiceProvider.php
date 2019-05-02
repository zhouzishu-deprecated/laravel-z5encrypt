<?php

namespace Zhouzishu\LaravelZ5Encrypt;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__).'/config/z5encrypt.php' => config_path('z5encrypt.php'), ],
            'laravel-pay'
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/z5encrypt.php', 'z5encrypt');
    
        $this->app->singleton('z5encrypt', function () {
            return new Z5Encrypt(config('z5encrypt'));
        });
    }
}
 