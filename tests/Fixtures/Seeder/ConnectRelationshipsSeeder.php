<?php

namespace timedoor\RoleJs\Tests\Fixtures\Seeder;

class ConnectRelationshipsSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolePermissions = [
            'admin' => ['create.user', 'read.user', 'update.user', 'delete.user'],
            'editor' => ['read.user'],
        ];

        foreach ($rolePermissions as $role => $permissions) {
            $role = config('roles.models.role')::where('slug', '=', $role)->first();
            foreach ($permissions as $permission) {
                $permission = config('roles.models.permission')::where('slug', '=', $permission)->first();
                $role->attachPermission($permission);
            }
        }
    }
}
