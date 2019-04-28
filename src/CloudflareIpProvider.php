<?php

namespace TaylorNetwork\CloudflareIP;

use Illuminate\Support\ServiceProvider;
use TaylorNetwork\CloudflareIP\Commands\CloudflareIpInstall;

class CloudflareIpProvider extends ServiceProvider
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
