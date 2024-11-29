<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Admin user and assign the 'admin' role
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'status' => 'active_user',
        ]);
        $admin->assignRole('admin');

        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@mail.com',
            'password' => Hash::make('password'),
            'status' => 'active_user',
        ]);
        $manager->assignRole('manager');
    }
}
