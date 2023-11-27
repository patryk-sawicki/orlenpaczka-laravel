<?php

namespace PatrykSawicki\OrlenPaczkaTests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        /*Add config from /src/config*/
        $this->app['config']->set('op', require __DIR__ . '/../src/config/op.php');
    }
}