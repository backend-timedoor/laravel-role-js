<?php

namespace timedoor\RoleJs\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use timedoor\RoleJs\RoleJsServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            RoleJsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
