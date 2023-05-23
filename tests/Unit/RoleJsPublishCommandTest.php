<?php

use Illuminate\Support\Facades\File;

afterEach(function () {
    File::deleteDirectory(base_path('resources/js'));
    File::deleteDirectory(base_path('resources/scripts'));
});

it('can publish initial javascript files', function () {
    $this->artisan('role-js:publish')
        ->expectsOutput('The files has been published to resources/js/roles.')
        ->assertExitCode(0);

    assertPublishedFile($this, 'resources/js/roles');
})->group('role-js:publish');

it('can publish initial javascript files in different path', function () {
    $path = 'resources/scripts/roles';

    $this->artisan('role-js:publish', ['path' => $path])
        ->expectsOutput("The files has been published to {$path}.")
        ->assertExitCode(0);

    assertPublishedFile($this, $path);
})->group('role-js:publish');

function assertPublishedFile($test, string $path)
{
    $test->assertFileExists(base_path($path.'/index.ts'));
    $test->assertFileExists(base_path($path.'/data.ts'));
    $test->assertFileExists(base_path($path.'/type.ts'));
    $test->assertFileExists(base_path($path.'/useRole.ts'));

    $test->assertFileEquals(__DIR__.'/../../stubs/js/roles/index.ts', base_path($path.'/index.ts'));
    $test->assertFileEquals(__DIR__.'/../../stubs/js/roles/data.ts', base_path($path.'/data.ts'));
    $test->assertFileEquals(__DIR__.'/../../stubs/js/roles/type.ts', base_path($path.'/type.ts'));
    $test->assertFileEquals(__DIR__.'/../../stubs/js/roles/useRole.ts', base_path($path.'/useRole.ts'));
}
