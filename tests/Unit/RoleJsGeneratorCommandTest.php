<?php

use Illuminate\Support\Facades\File;
use timedoor\RoleJs\Tests\Fixtures\Generator\CustomGenerator;
use timedoor\RoleJs\Tests\Fixtures\Seeder\ConnectRelationshipsSeeder;
use timedoor\RoleJs\Tests\Fixtures\Seeder\PermissionsTableSeeder;
use timedoor\RoleJs\Tests\Fixtures\Seeder\RolesTableSeeder;

afterEach(function () {
    File::deleteDirectory(base_path('resources/js'));
    File::deleteDirectory(base_path('resources/scripts'));
});

it('can generate roles & permissions data', function () {
    config()->set('role-js.generator', CustomGenerator::class);

    $this->artisan('role-js:generate')
        ->expectsOutput('The resources/js/roles/data.ts file has been generated.')
        ->assertExitCode(0);

    assertGeneratedFile($this, 'resources/js/roles');
})->group('role-js:generate');

it('can generate roles & permissions data in different path', function () {
    config()->set('role-js.generator', CustomGenerator::class);
    $path = 'resources/scripts/roles';

    $this->artisan('role-js:generate', ['path' => $path])
        ->expectsOutput("The {$path}/data.ts file has been generated.")
        ->assertExitCode(0);

    assertGeneratedFile($this, $path);
})->group('role-js:generate');

it('can generate roles & permissions data using default generator', function () {
    (new RolesTableSeeder)->run();
    (new PermissionsTableSeeder)->run();
    (new ConnectRelationshipsSeeder)->run();

    $this->artisan('role-js:generate')
        ->expectsOutput('The resources/js/roles/data.ts file has been generated.')
        ->assertExitCode(0);

    assertGeneratedFile($this, 'resources/js/roles');
})->group('role-js:generate');

function assertGeneratedFile($test, string $path)
{
    $test->assertFileExists(base_path($path.'/data.ts'));

    $test->assertFileEquals(__DIR__.'/../Fixtures/js/roles/data.ts', base_path($path.'/data.ts'));
}
