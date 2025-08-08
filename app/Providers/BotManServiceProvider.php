<?php

namespace App\Providers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Support\ServiceProvider;

class BotManServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BotMan::class, function ($app) {
            // Load the driver
            DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

            // Get BotMan configuration from config/botman.php
            $config = config('botman');

            return BotManFactory::create($config);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the BotMan web driver view (chat.blade.php)
        // The assets (JS/CSS) for the web driver are typically loaded via CDN or are part of the driver itself
        // and don't need manual publishing from 'resources/assets' in this package structure.
        $this->publishes([
            base_path('vendor/botman/driver-web/src/Laravel/views/chat.blade.php') => resource_path('views/vendor/botman/chat.blade.php'),
        ], 'botman-web-views'); // Ganti tag publish
    }
}