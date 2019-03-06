<?php

namespace TaylorNetwork\CloudflareIP;

use TaylorNetwork\CloudflareIP\Commands\CloudflareIpInstall;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            CloudflareIpInstall::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
