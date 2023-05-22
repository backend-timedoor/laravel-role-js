<?php

namespace timedoor\RoleJs\Commands;

use Illuminate\Console\Command;

class RoleJsCommand extends Command
{
    public $signature = 'laravel-role-js';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
