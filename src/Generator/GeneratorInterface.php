<?php

namespace timedoor\RoleJs\Generator;

interface GeneratorInterface
{
    /**
     * @return \Illuminate\Support\Collection<int, string>
     */
    public function getRoles();

    /**
     * @return \Illuminate\Support\Collection<int, string>
     */
    public function getPermissions();

    /**
     * @return \Illuminate\Support\Collection<string, string[]>
     */
    public function getRolePermissions();
}
