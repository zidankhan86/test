<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Role Permissions
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            // User Permissions
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            // Student Data Permissions
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
