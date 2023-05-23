<?php

namespace timedoor\RoleJs\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use timedoor\RoleJs\Generator\JeremyKenedyRoleGenerator;

class RoleJsGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role-js:generate
                            {path? : Path to the generated JavaScript file. Default: `resources/js/roles`.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a JavaScript file containing roles and permissions.';

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the path to the generated JavaScript file.
        $target = $this->argument('path') ?? 'resources/js/roles';
        $path = base_path($target);

        // Create the directory if it doesn't exist.
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0755, true);
        }

        // Get the roles and permissions.
        $generated = $this->generate();

        // Generate the JavaScript file.
        $this->files->put($path.'/data.ts', $generated);

        $this->info("The {$target}/data.ts file has been generated.");

        return static::SUCCESS;
    }

    protected function generate()
    {
        /** @var class-string $generatorClass */
        $generatorClass = config('role-js.generator', JeremyKenedyRoleGenerator::class);

        /** @var \timedoor\RoleJs\Generator\GeneratorInterface $generator */
        $generator = new $generatorClass;

        $role = $generator->getRoles();
        $permissions = $generator->getPermissions();
        $rolePermission = $generator->getRolePermissions();

        return <<<TYPESCRIPT
const roles = {$role->toJson()} as const;
const permissions = {$permissions->toJson()} as const;
const rolePermission = {$rolePermission->toJson()} as const;

export {
  roles,
  permissions,
  rolePermission,
};
TYPESCRIPT;
    }
}
