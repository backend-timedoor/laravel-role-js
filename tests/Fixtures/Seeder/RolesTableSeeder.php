<?php

namespace timedoor\RoleJs\Tests\Fixtures\Seeder;

class RolesTableSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'Admin Role',
                'level' => 1,
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Editor Role',
                'level' => 1,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name' => $RoleItem['name'],
                    'slug' => $RoleItem['slug'],
                    'description' => $RoleItem['description'],
                    'level' => $RoleItem['level'],
                ]);
            }
        }
    }
}
