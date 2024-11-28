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
            'email' => 'admin@mail.com', // Updated email
            'password' => Hash::make('password'), // Default password for seeding
        ]);
        $admin->assignRole('admin');

        // Create the Manager user and assign the 'manager' role
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@mail.com',
            'password' => Hash::make('password'),
            'status' => '1',
        ]);
        $manager->assignRole('manager');
    }
}
