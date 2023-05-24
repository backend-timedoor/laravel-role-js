<?php

namespace timedoor\RoleJs\Tests\Fixtures\Generator;

use timedoor\RoleJs\Generator\GeneratorInterface;

class CustomGenerator implements GeneratorInterface
{
    public function getRoles()
    {
        return collect(['admin', 'editor']);
    }

    public function getPermissions()
    {
        return collect(['create.user', 'read.user', 'update.user', 'delete.user']);
    }

    public function getRolePermissions()
    {
        return collect([
            'admin' => ['create.user', 'read.user', 'update.user', 'delete.user'],
            'editor' => ['read.user'],
        ]);
    }
}
