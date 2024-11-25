<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of roles for an inventory management system
        $roles = [
            'admin',          // Full access to the system
            'manager',        // Access to manage reports and inventory
            'student',   // Manage stock levels and stock movements
        ];

        // Loop through each role and create it in the database
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web', // Specifying the guard as 'web'
            ]);
        }

        $adminRole = Role::where('name', 'admin')->first();
        $permissions = Permission::all(); // Get all permissions

        $adminRole->syncPermissions($permissions); // Assign all permissions to the admin role

    }
}
