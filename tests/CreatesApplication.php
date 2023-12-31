<?php

namespace PatrykSawicki\OrlenPaczkaTests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/laravel.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}