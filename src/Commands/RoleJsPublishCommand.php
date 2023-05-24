<?php

namespace timedoor\RoleJs\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class RoleJsPublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role-js:publish
                            {path? : Path to the publish JavaScript files. Default: `resources/js/roles`.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish a JavaScript files containing logic for roles and permissions.';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $file;

    public function __construct(Filesystem $file)
    {
        parent::__construct();

        $this->file = $file;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the path to the generated JavaScript file.
        $path = $this->argument('path') ?? 'resources/js/roles';

        // Copy directory from package to the specified path.
        $this->file->copyDirectory(__DIR__.'/../../stubs/js/roles', base_path($path));

        $this->info("The files has been published to {$path}.");

        return self::SUCCESS;
    }
}
