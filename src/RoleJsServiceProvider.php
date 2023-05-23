<?php

namespace timedoor\RoleJs;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use timedoor\RoleJs\Commands\RoleJsCommand;
use timedoor\RoleJs\Commands\RoleJsPublishCommand;

class RoleJsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-role-js')
            ->hasConfigFile()
            ->hasCommands([
                RoleJsCommand::class,
                RoleJsPublishCommand::class,
            ]);
    }
}
