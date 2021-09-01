<?php

namespace Rdt\IO;

use Illuminate\Support\ServiceProvider;

class IOServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . "/routes/Api.php");
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
        $this->loadViewsFrom(__DIR__ . "/resources/views", 'IO');
        $this->publishes([__DIR__ . "/resources/assets/io" => public_path('../../theme/io')], 'IOtheme');
    }
}