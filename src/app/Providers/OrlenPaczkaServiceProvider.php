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
        $path = realpath($raw = __DIR__ . '/../../');

//        include $path . '/routes/web.php';

        if (!file_exists($this->app->databasePath() . '/config/op.php')) {
            $this->publishes([$path . '/config/op.php' => config_path('op.php')], 'config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $path = realpath($raw = __DIR__ . '/../../');
        $this->mergeConfigFrom($path . '/config/op.php', 'op');
    }
}
