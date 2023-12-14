<?php

namespace PatrykSawicki\OrlenPaczkaApi\app\Providers;

use Illuminate\Support\ServiceProvider;

class OrlenPaczkaServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        if (!defined('ORLEN_PACZKA_PATH')) {
            define('ORLEN_PACZKA_PATH', realpath(__DIR__ . '/../../'));
        }

        include ORLEN_PACZKA_PATH . '/routes/web.php';

        if (!file_exists($this->app->databasePath() . '/config/op.php')) {
            $this->publishes([ORLEN_PACZKA_PATH . '/config/op.php' => config_path('op.php')], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        if (!defined('ORLEN_PACZKA_PATH')) {
            define('ORLEN_PACZKA_PATH', realpath(__DIR__ . '/../../'));
        }

        $this->mergeConfigFrom(ORLEN_PACZKA_PATH . '/config/op.php', 'op');
        $this->loadViewsFrom(ORLEN_PACZKA_PATH . '/resources/views/', 'op');
    }
}
