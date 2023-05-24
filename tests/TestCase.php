<?php

namespace timedoor\RoleJs\Tests;

use CreatePermissionRoleTable;
use CreatePermissionsTable;
use CreateRolesTable;
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

        // load all config files from jeremykenedy/laravel-roles
        $configFiles = glob(__DIR__.'/../vendor/jeremykenedy/laravel-roles/src/config/*.php');

        foreach ($configFiles as $configFile) {
            $configName = str_replace('.php', '', basename($configFile));

            config()->set($configName, require $configFile);
        }

        // load all migrations from jeremykenedy/laravel-roles
        foreach (glob(__DIR__.'/../vendor/jeremykenedy/laravel-roles/src/Database/Migrations/*.php') as $filename) {
            include_once $filename;
        }

        (new CreateRolesTable)->up();
        (new CreatePermissionsTable)->up();
        (new CreatePermissionRoleTable)->up();
    }
}
