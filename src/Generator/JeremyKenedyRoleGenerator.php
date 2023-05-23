<?php

namespace timedoor\RoleJs\Generator;

class JeremyKenedyRoleGenerator implements GeneratorInterface
{
    public function getRoles()
    {
        /** @var \Illuminate\Database\Eloquent\Model $roleClass */
        $roleClass = config('roles.models.role');

        return $roleClass::query()->pluck('slug');
    }

    public function getPermissions()
    {
        /** @var \Illuminate\Database\Eloquent\Model $permissionClass */
        $permissionClass = config('roles.models.permission');

        return $permissionClass::query()->pluck('slug');
    }

    public function getRolePermissions()
    {
        /** @var \Illuminate\Database\Eloquent\Model $roleClass */
        $roleClass = config('roles.models.role');

        $roles = $roleClass::with('permissions:id,slug')->get();

        /** @var \Illuminate\Support\Collection<string, string[]> $rolePermissions */
        $rolePermissions = $roles->mapWithKeys(function ($role) {
            return [$role->getAttribute('slug') => $role->getAttribute('permissions')->pluck('slug')];
        });

        return $rolePermissions;
    }
}
