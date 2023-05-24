<?php

namespace timedoor\RoleJs\Tests\Fixtures\Seeder;

class PermissionsTableSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name' => 'Can Create User',
                'slug' => 'create.user',
                'description' => 'Can create new user',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Read Users',
                'slug' => 'read.user',
                'description' => 'Can read user',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Update User',
                'slug' => 'update.user',
                'description' => 'Can update user',
                'model' => 'Permission',
            ],
            [
                'name' => 'Can Delete User',
                'slug' => 'delete.user',
                'description' => 'Can delete user',
                'model' => 'Permission',
            ],
        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])
                ->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name' => $Permissionitem['name'],
                    'slug' => $Permissionitem['slug'],
                    'description' => $Permissionitem['description'],
                    'model' => $Permissionitem['model'],
                ]);
            }
        }
    }
}
