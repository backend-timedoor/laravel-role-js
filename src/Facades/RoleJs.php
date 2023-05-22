<?php

namespace timedoor\RoleJs\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \timedoor\RoleJs\RoleJs
 */
class RoleJs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \timedoor\RoleJs\RoleJs::class;
    }
}
